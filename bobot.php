<?php
include("config.php");
include("fungsi.php");
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
    <title>Sistem Pendukung Keputusan</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sistem Pendukung <br>
                    <center>Keputusan</center>
                </a>

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="item" href="home.php">Home</a></li>
                    <li>
                        <a class="item" href="kriteria.php">Kriteria
                            <div class="ui blue tiny label" style="float: right;"><?php echo getJumlahKriteria(); ?></div>
                        </a>
                    </li>
                    <li>
                        <a class="item" href="alternatif.php">Alternatif
                            <div class="ui blue tiny label" style="float: right;"><?php echo getJumlahAlternatif(); ?></div>
                        </a>
                    </li>
                    <li><a class="item" href="poin.php">Bobot</a></li>
                    <li><a class="item" href="bobot_kriteria.php">Perbandingan Kriteria</a></li>
                    <li><a class="item" href="kriteria_topsis.php">Kriteria Topsis</a></li>
                    <li><a class="item" href="bobot.php">Nilai Matriks</a></li>
                    <li><a class="item" href="hastop.php">Hasil</a></li>
                    <li><a class="item" href="laporan.php">Laporan</a></li>
                    <li><a class="item" href="logout.php">Log-out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--tabel-tabel dan form-->
    <div class="container">
        <!--container-->
        <div class="row">
            <!--row-->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Nilai Matriks
                    </div>

                    <div class="panel-body">
                        <!--form pengisian-->
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        Alternatif
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form class="form" action="tambahnilmat.php" method="post">
                                                    <div class="form-group">
                                                        <select class="form-control" name="alter">
                                                            <option>Nama Alternatif</option>
                                                            <?php
                                                            //ambil data dari database
                                                            $nama = $koneksi->query('SELECT * FROM tab_alternatif ORDER BY nama_alternatif');
                                                            while ($datalter = $nama->fetch_array()) {
                                                                echo "<option value=\"$datalter[id_alternatif]\">$datalter[nama_alternatif]</option>\n";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="krit">
                                                            <option>Nama Kriteria</option>
                                                            <?php
                                                            //ambil data dari database
                                                            $krit = $koneksi->query('SELECT * FROM tab_kriteria ORDER BY nama_kriteria');
                                                            while ($datakrit = $krit->fetch_array()) {
                                                                echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="nilai">
                                                            <option>Nilai</option>
                                                            <?php
                                                            //ambil data dari database
                                                            $poin = $koneksi->query('SELECT * FROM tab_poin ORDER BY poin');
                                                            while ($datapoin = $poin->fetch_array()) {
                                                                echo "<option value=\"$datapoin[id_poin]\">$datapoin[poin]</option>\n";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Proses</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--tabel-tabel-->
                            <div class="row">
                                <!--tabel alternatif-->
                                <div class="col-xs-6 col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center">
                                            Tabel Alternatif
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?php
                                                    $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                                                    ?>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Alternatif</th>
                                                                <th>Nama Alternatif</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = $sql->fetch_array()) {
                                                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--tabel kriteria-->

                                <div class="col-xs-6 col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center">
                                            Tabel Kriteria
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?php
                                                    $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                                                    ?>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kriteria</th>
                                                                <th>Nama Kriteria</th>
                                                                <th>Bobot</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = $sql->fetch_array()) {
                                                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                                                echo ("<td align=\"left\">" . $row[2] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--tabel poin-->
                                <div class="col-xs-6 col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center">
                                            Tabel Bobot
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?php
                                                    $sql = $koneksi->query('SELECT * FROM tab_poin');
                                                    ?>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Id Bobot</th>
                                                                <th>Bobot</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = $sql->fetch_array()) {
                                                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                echo ("<td align=\"center\">" . $row[1] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--tabel poin-->
                                <div class="col-xs-6 col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center">
                                            Tabel Priority Vektor
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?php
                                                    $sql = $koneksi->query('SELECT * FROM pv_kriteria');
                                                    ?>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Id Priority vektor</th>
                                                                <th>Bobot</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = $sql->fetch_array()) {
                                                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
    </div>
    <!--container-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Pemberian Nilai
                    </div>

                    <div class="panel-body">
                        <?php
                        //pemanggilan data, matra dan pangkat
                        $sql = $koneksi->query("SELECT * FROM tab_topsis
                        JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                        JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria")
                        ?>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ALTERNATIF</th>
                                    <th>KRITERIA</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                //menampilkan data
                                while ($row = $sql->fetch_array()) {
                                    $nmkriteria   = $row['nama_kriteria'];
                                    echo ("<tr><td align=\"center\">" . $no . "</td>");
                                    echo ("<td align=\"left\">" . $row[4] . "</td>");
                                    echo ("<td align=\"left\">" . $nmkriteria . "</td>");
                                    echo ("<td align=\"left\">" . $row[2] . "</td>");
                                    echo "</tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
    </div>
    <!--container-->

    <!--tabel penentuan nilai-->
    <div class="container">
        <!--container-->
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Pendapatan
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        < 1.000.000 </td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>1.000.000 - < 1.500.000</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1.500.000 - < 2.000.000</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>2.000.000 - < 2.500.000</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>≥2.500.000</td>
                                    <td>1</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Pekerjaan
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pengangguran < </td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Juru Parkir</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Pedagang </td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Art - Satpam </td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Sopir </td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Umur
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>> 40 </td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>> 35 - 40</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>> 30 - 35 </td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>> 25 - 30 </td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>≤25 </td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Luas Tanah
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>≤2 < </td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>3-4</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>5-6 </td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>7-8</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>≥9</td>
                                    <td>1</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Jumlah Tanggungan
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0 < </td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>≥4</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Kondisi Badan
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rumah Ngontrak</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Rumah Orang Tua</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Rumah Pribadi</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Jenis Penerangan
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Sub Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>450w</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>900w</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>1300w</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container-->

</body>

</html>