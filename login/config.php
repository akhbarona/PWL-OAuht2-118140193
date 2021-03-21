<?php
session_start();
require_once "GoogleAPI/vendor/autoload.php";

$gClient = new Google_Client();

$gClient->setClientId("791699633832-bni9gova5762sdqjaj6l70f02m65qm7k.apps.googleusercontent.com");
$gClient->setClientSecret("zt4Sr89L9AkuzeKPwUYWhGNf");
$gClient->setApplicationName("Praktikum Web Lanjut");
$gClient->setRedirectUri("https://localhost/login/logingmail.php");

$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>