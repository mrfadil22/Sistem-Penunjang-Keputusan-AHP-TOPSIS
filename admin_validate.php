<?php
session_start();
$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];
include('config.php');
$query = "SELECT * from admin where username='$USERNAME' and password_admin='$PASSWORD'";

$res = $koneksi->query($query);

if ($row = $res->fetch_row()) {
    $_SESSION['logged-in'] = true;
    $_SESSION['username'] = $username;
    header('Location: home.php');
} else {
    $_SESSION['salah'] = 'salah';
    header('Location: index.php');
}
