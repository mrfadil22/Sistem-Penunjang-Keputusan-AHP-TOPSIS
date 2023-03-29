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

    <center>
        <h1>Laporan Penerima Bantuan Langsung Tunai</h1>
    </center>

    <div class="panel-body">
        <?php
        //pemanggilan data, matra dan pangkat
        $sql = $koneksi->query("SELECT * FROM tab_rangking Order By nilai ASC")
        ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Penerima Bantuan Langsung Tunai</th>
                    <th>Hasil Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                //menampilkan data
                while ($row = $sql->fetch_array()) {
                    $nmalternatif   = $row['nama_alternatif'];
                    echo ("<tr><td align=\"center\">" . $no . "</td>");
                    echo ("<td align=\"left\">" . $nmalternatif . "</td>");
                    echo ("<td align=\"left\">" . $row[2] . "</td>");
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>