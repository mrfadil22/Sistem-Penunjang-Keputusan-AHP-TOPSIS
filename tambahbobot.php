<?php
include("config.php");
include("fungsi.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <!--icon-->
    <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Perbandingan Alternatif Kriteria
                    </div>

                    <ul class="nav nav-tabs">

                        <li>
                            <a href="bobot.php" data-toggle="tab">Tabel Data</a>
                        </li>

                        <li class="active">
                            <a href="tambahbobot.php" data-toggle="tab">Tambah Data</a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--form kriteria-->
                            <form class="form" action="tambahbobot.php" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="alter">
                                        <option>Nama Alternatif </option>
                                        <?php
                                        //ambil data dari database
                                        $alter = $koneksi->query('SELECT * FROM alternatif ORDER BY nama');
                                        while ($dataalter = $alter->fetch_array()) {
                                            echo "<option value=\"$dataalter[id]\">$dataalter[nama]</option>\n";
                                        }
                                        ?>
                                    </select>
                                </div>

                        </div>
                        <div class="form-group">
                            <select class="form-control" name="krit">
                                <option>Nama Kriteria </option>
                                <?php
                                //ambil data dari database
                                $krit = $koneksi->query('SELECT * FROM kriteria ORDER BY nama');
                                while ($datakrit = $krit->fetch_array()) {
                                    echo "<option value=\"$datakrit[id]\">$datakrit[nama]</option>\n";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="poin">
                                <option>Bobot Kriteria</option>
                                <?php
                                //ambil data dari database
                                $poin = $koneksi->query('SELECT * FROM tab_poin ORDER BY poin');
                                while ($datapoin = $poin->fetch_array()) {
                                    echo "<option value=\"$datapoin[id_poin]\">$poin[poin]</option>\n";
                                }
                                ?>
                            </select>
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
</body>

</html>