<?php
include('config.php');
$nama = $_POST['nama_kriteria'];

include('config.php');

$query = "INSERT INTO tab_kriteria (nama_kriteria) VALUES ('$nama')";
$res = $koneksi->query($query);
mysqli_close($koneksi);
if ($res) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=kriteria.php">';
    exit;
}
