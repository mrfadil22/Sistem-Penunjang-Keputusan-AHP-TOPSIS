<?php
//koneksi
session_start();
include("config.php");

$nilai = $_POST['rangking'];

$tambah = $koneksi->query('SELECT nilai FROM tab_rangking');

if ($row = $tambah->fetch_row()) {

    $masuk = "INSERT INTO tab_rangking VALUES ('" . $nilai . "')";
    $buat  = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil') </script>";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=hastop.php">';
}
