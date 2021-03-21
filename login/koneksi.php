<?php
$servername = "localhost";
$database = "loginwithgmail";
$username = "root";
$password = "";
$kon = mysqli_connect($servername, $username, $password, $database);
if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>