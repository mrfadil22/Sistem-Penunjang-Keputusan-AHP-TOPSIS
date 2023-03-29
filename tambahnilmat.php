<?php
//koneksi
session_start();
include("config.php");

$alternatif = $_POST['alter'];
$kriteria   = $_POST['krit'];
$poin       = $_POST['nilai'];

$tambah = $koneksi->query('SELECT * FROM tab_topsis');

if ($row = $tambah->fetch_row()) {

    $masuk = "INSERT INTO tab_topsis VALUES ('" . $alternatif . "','" . $kriteria . "','" . $poin . "')";
    $buat  = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil') </script>";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bobot.php">';
}
