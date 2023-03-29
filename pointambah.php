<?php
include('config.php');
include('fungsi.php');
include('header.php');

$x = $koneksi->query("SELECT MAX(id_poin) + 1 from tab_poin");
$y = $x->fetch_array();

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
                        Poin
                    </div>

                    <ul class="nav nav-tabs">
                        <li>
                            <a href="poin.php" data-toggle="tab">Tabel Poin</a>
                        </li>
                        <li class="active">
                            <a href="pointambah.php" data-toggle="tab">Tambah Poin</a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="">
                                <!--form poin-->
                                <form class="form" action="pointambah.php" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="id_poin" value="<?= $y[0] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="poin" placeholder="Poin">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" name="simpan" value="Tambah">
                                    </div>
                                </form>
                                <!--form poin-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php

    if (isset($_POST['simpan'])) {
        $id_poin = $_POST['id_poin'];
        $poin    = $_POST['poin'];

        $tambah = $koneksi->query('SELECT * FROM tab_poin');

        if ($row = $tambah->fetch_row()) {

            $masuk = "INSERT INTO tab_poin VALUES ('" . $id_poin . "','" . $poin . "')";
            $buat  = $koneksi->query($masuk);

            echo "<script>alert('Input Data Berhasil') </script>";
            echo "<script>window.location.href = \"poin.php\" </script>";
        }
    }

    ?>

    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>