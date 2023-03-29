<?php

include('config.php');
if (isset($_GET['id_kriteria'])) {
    $id     = $_GET['id_kriteria'];

    // hapus record
    $query     = "SELECT nama_kriteria FROM tab_kriteria WHERE id_kriteria=$id";
    $result    = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $nama = $row['nama_kriteria'];
    }
}

if (isset($_POST['update'])) {
    $id     = $_POST['id_kriteria'];
    $nama     = $_POST['nama_kriteria'];

    $query     = "UPDATE tab_kriteria SET nama_kriteria='$nama' WHERE id_alternatif=$id";
    $result    = mysqli_query($koneksi, $query);
}
if ($koneksi->affected_rows > 0) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=kriteria.php">';
    exit;
}
