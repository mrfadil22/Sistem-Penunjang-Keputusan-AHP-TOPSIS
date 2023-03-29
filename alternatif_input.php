<?php
include('config.php');
$nama = $_POST['nama_alternatif'];

include('config.php');

$query = "INSERT INTO tab_alternatif (nama_alternatif) VALUES ('$nama')";
$res = $koneksi->query($query);
mysqli_close($koneksi);
if ($res) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=alternatif.php">';
    exit;
}
