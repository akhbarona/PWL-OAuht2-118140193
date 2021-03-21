<?php
function login()
{
    include 'koneksi.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from user where email='" . $email . "' and password='" . $password . "' limit 1";
    $result = mysqli_query($kon, $sql);
    $rowDB = mysqli_num_rows($result);
    $_SESSION['login_biasa'] = $_POST['submit'];
    if ($rowDB > 0) {
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['access_token'] = $row['id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['givenName'] = $row['givenName'];
            $_SESSION['familyName'] = $row['familyName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['picture'] = "image not found";
            header('Location: index.php');
            exit;
    } else {
        $message = "user belum ada";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>