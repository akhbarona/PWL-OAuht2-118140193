<?php

require_once "config.php";
require_once "koneksi.php";

if(isset($_SESSION['access_token']))
    $gClient->setAccessToken($_SESSION['access_token']);
elseif(isset($_GET['code'])){
    //jika code terdifinisi maka coba ambil code yang ada ganti dengan token autentikasi yang valid
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    //masukkan token ke session
    $_SESSION['access_token'] = $token;
}else{
    header('Location: loginform.php');
    exit();
}


$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

$email = $userData['email'];

$sql = mysqli_query($kon, "SELECT * FROM user WHERE email='".$email."'");
$user = mysqli_fetch_array($sql);

if(empty($user)){
    $firstName = $userData['givenName'];
    $lastName = $userData['familyName'];
    $ex = explode('@', $email); // Pisahkan berdasarkan "@" pada email
    $username = $ex[0];
    mysqli_query($kon, "INSERT INTO user(username, givenName, familyName, email) VALUES('".$username."', '".$firstName."', '".$lastName."','".$email."')");
    $id = mysqli_insert_id($kon);
}else{
    $id = $user['id'];
    $username = $user['username'];
    $firstName = $user['givenName'];
    $lastName = $user['familyName'];
    $email = $user['email'];
}

$_SESSION['id'] = $userData['id'];
$_SESSION['email'] = $email;
$_SESSION['picture'] = $userData['picture'];
$_SESSION['familyName'] = $lastName;
$_SESSION['givenName'] = $firstName;

header('Location: index.php');
exit();
?>