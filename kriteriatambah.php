<?php
//koneksi
session_start();
include('config.php');
include('fungsi.php');
include('header.php');

//pemberian kode id secara otomatis
$carikode = $koneksi->query("SELECT id_kriteria FROM tab_kriteria");
$datakode = $carikode->fetch_array();
$jumlah_data = mysqli_num_rows($carikode);

if ($datakode) {
    $nilaikode = substr($jumlah_data, 0, 1);
    $kode = (int) $nilaikode;
    $kode = $jumlah_data + 1;
    $kode_otomatis = str_pad($kode, 0, STR_PAD_LEFT);
} else {
    $kode_otomatis = "1";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <!--icon-->
    <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Kriteria
                    </div>

                    <ul class="nav nav-tabs">
                        <li>
                            <a href="kriteria_topsis.php" data-toggle="tab">Tabel Kriteria</a>
                        </li>
                        <li class="active">
                            <a href="kriteriatambah.php" data-toggle="tab">Tambah Kriteria</a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--form kriteria-->
                            <form class="form" action="kriteriatambah.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="id_krit" value="<?php echo $kode_otomatis; ?>" readonly>
                                </div>
                                </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="nm_krit">
                                <option>Nama Kriteria</option>
                                <?php
                                //ambil data dari database
                                $krit = $koneksi->query('SELECT * FROM kriteria ORDER BY nama');
                                while ($datakrit = $krit->fetch_array()) {
                                    echo "<option value=\"$datakrit[nama]\">$datakrit[nama]</option>\n";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="bobot">
                                <option>Bobot Kriteria</option>
                                <?php
                                // ambil data dari database
                                // $bobot = $koneksi->query('SELECT * FROM pv_kriteria ORDER BY id_kriteria');
                                // while ($databobot = $bobot->fetch_array()) {
                                //     echo "<option value=\"$databobot [nilai]\">$databobot[nilai]</option>\n";
                                // }
                                ?>
                                <?php

                                $bobot = $koneksi->query('SELECT * FROM pv_kriteria ORDER BY id_kriteria');
                                while ($databobot = $bobot->fetch_array()) { ?>

                                    <option value="<?= $databobot['nilai'] ?>"><?= $databobot['nilai'] ?></option>

                                <?php } ?>

                            </select>
                            <!-- <input type="text" name="bobot"> -->
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="simpan" value="Tambah">
                        </div>
                        </form>
                        <!--form kriteria-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php

    if (isset($_POST['simpan'])) {
        $id_krit  = $_POST['id_krit'];
        $kriteria = $_POST['nm_krit'];
        $bobot    = $_POST['bobot'];

        $sql    = "SELECT * FROM tab_kriteria";
        $tambah = $koneksi->query($sql);

        if ($row = $tambah->fetch_row()) {

            $masuk = "INSERT INTO tab_kriteria VALUES ('" . $id_krit . "','" . $kriteria . "','" . $bobot . "')";
            $buat  = $koneksi->query($masuk);

            echo "<script>alert('Input Data Berhasil') </script>";
            echo "<script>window.location.href = \"kriteria_topsis.php\" </script>";
        }
    }

    ?>

    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>