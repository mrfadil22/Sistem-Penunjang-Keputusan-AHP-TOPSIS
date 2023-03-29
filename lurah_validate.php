<?php
session_start();
$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];
include('config.php');
$query = "SELECT * from lurah where username='$USERNAME' and password_lurah='$PASSWORD'";

$res = $koneksi->query($query);

if ($row = $res->fetch_row()) {
    $_SESSION['logged-in'] = true;
    $_SESSION['username'] = $username;
    header('Location: home_lurah.php');
} else {
    $_SESSION['salah'] = 'salah';
    header('Location: loginlurah.php');
}
