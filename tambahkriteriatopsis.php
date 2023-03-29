<?php
//koneksi
session_start();
include("config.php");

$kriteria   = $_POST['krit'];
$bobot      = $_POST['nilai'];

$tambah = $koneksi->query('SELECT * FROM tab_kriteria');

if ($row = $tambah->fetch_row()) {

    $masuk = "INSERT INTO tab_kriteria VALUES ('" . $bobot . "')";
    $buat  = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil') </script>";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=kriteria_topsis.php">';
}
