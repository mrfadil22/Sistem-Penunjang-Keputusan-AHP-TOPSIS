<?php
include("config.php");
include("fungsi.php");

$tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot
      FROM
        tab_topsis a
        JOIN
          tab_alternatif b USING(id_alternatif)
        JOIN
          tab_kriteria c USING(id_kriteria)");


$data      = array();
$kriterias = array();
$bobot     = array();
$nilai_kuadrat = array();

if ($tampil) {
    while ($row = $tampil->fetch_object()) {
        if (!isset($data[$row->nama_alternatif])) {
            $data[$row->nama_alternatif] = array();
        }
        if (!isset($data[$row->nama_alternatif][$row->nama_kriteria])) {
            $data[$row->nama_alternatif][$row->nama_kriteria] = array();
        }
        if (!isset($nilai_kuadrat[$row->nama_kriteria])) {
            $nilai_kuadrat[$row->nama_kriteria] = 0;
        }
        $bobot[$row->nama_kriteria] = $row->bobot;
        $data[$row->nama_alternatif][$row->nama_kriteria] = $row->nilai;
        $nilai_kuadrat[$row->nama_kriteria] += pow($row->nilai, 2);
        $kriterias[] = $row->nama_kriteria;
    }
}

$kriteria     = array_unique($kriterias);
$jml_kriteria = count($kriteria);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pendukung Keputusan</title>
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!--menu-->
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



    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Evaluation Matrix (x<sub>ij</sub>)
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan='3'>No</th>
                                <th rowspan='3'>Alternatif</th>
                                <th rowspan='3'>Nama</th>
                                <th colspan='<?php
                                                echo $jml_kriteria; ?>'>Kriteria</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($kriteria as $k)
                                    echo "<th>$k</th>\n";
                                ?>
                            </tr>
                            <tr>
                                <?php
                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                    echo "<th>K$n</th>";
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($data as $nama => $krit) {
                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                                foreach ($kriteria as $k) {
                                    echo "<td align='center'>$krit[$k]</td>";
                                }
                                echo "</tr>\n";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Rating Kinerja Ternormalisasi (r<sub>ij</sub>)
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan='3'>No</th>
                                <th rowspan='3'>Alternatif</th>
                                <th rowspan='3'>Nama</th>
                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($kriteria as $k)
                                    echo "<th>$k</th>\n";
                                ?>
                            </tr>
                            <tr>
                                <?php
                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                    echo "<th>K$n</th>";
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($data as $nama => $krit) {
                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                foreach ($kriteria as $k) {
                                    echo "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) . "</td>";
                                }
                                echo
                                "</tr>\n";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--tabel-tabel-->
    <div class="container">
        <!--container-->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bobot Rata - Rata
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <?php
                            $pv = $koneksi->query('SELECT * FROM pv_kriteria');
                            ?>
                            <thead>
                                <tr>
                                    <th rowspan='3'>Id</th>
                                    <th rowspan='3'>Priority vektor</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $pv->fetch_array()) {
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

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Rating Bobot Ternormalisasi(y<sub>ij</sub>)
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Alternatif</th>
                                    <th rowspan='3'>Nama</th>
                                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                </tr>
                                <tr>
                                    <?php
                                    $bnefit1 = array();
                                    $bnefit2 = array();
                                    $bnefit3 = array();
                                    $bnefit4 = array();
                                    $bnefit5 = array();
                                    $bnefit6 = array();
                                    $bnefit7 = array();

                                    foreach ($kriteria as $k) {

                                        echo "<th>$k </th>\n";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($n = 1; $n <= $jml_kriteria; $n++) {
                                        echo "<th>K$n</th>";
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $i = 0;
                                        $y = array();
                                        foreach ($data as $nama => $krit) {
                                            echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                            $a1 = 0;
                                            $a2 = 0;
                                            $a3 = 0;
                                            $a4 = 0;
                                            $a5 = 0;
                                            $a6 = 0;
                                            $a7 = 0;
                                            $vbnefit1 = 0;
                                            foreach ($kriteria as $k) {
                                                $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                if ($k == 'Umur') {
                                                    $bnefit1[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit1[$k][$i - 1]), 3) . "</td>";
                                                    $a1++;
                                                } else if ($k == 'Pekerjaan') {
                                                    $bnefit2[$k][$i - 1]  = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit2[$k][$i - 1]), 3) . "</td>";
                                                    $a2++;
                                                } else if ($k == 'Pendapatan') {
                                                    $bnefit3[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit3[$k][$i - 1]), 3) . "</td>";
                                                    $a3++;
                                                } else if ($k == 'Jumlah Tanggungan') {
                                                    $bnefit4[$k][$i - 1]  = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit4[$k][$i - 1]), 3) . "</td>";
                                                    $a4++;
                                                } else if ($k == 'Status Tempat Tinggal') {
                                                    $bnefit5[$k][$i - 1]  = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit5[$k][$i - 1]), 3) . "</td>";
                                                    $a5++;
                                                } else if ($k == 'Luas Tanah') {
                                                    $bnefit6[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit6[$k][$i - 1]), 3) . "</td>";
                                                    $a6++;
                                                } else if ($k == 'Jenis Penerangan') {
                                                    $bnefit7[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * round(($bobot[$k]), 4);
                                                    echo "<td align='center'>" . round(($bnefit7[$k][$i - 1]), 3) . "</td>";
                                                    $a7++;
                                                }
                                            }
                                            echo
                                            "</tr>\n";
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Solusi Ideal positif (A<sup>+</sup>)
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                </tr>
                                <tr>
                                    <?php


                                        foreach ($kriteria as $k)

                                            echo "<th>$k</th>\n";


                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                        for ($n = 1; $n <= $jml_kriteria; $n++)
                                            echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $yplus = array();
                                        foreach ($kriteria as $k) {

                                            if ($k == 'Umur') {
                                                $yplus1[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$yplus1[$k]}</th>";
                                            } else if ($k == 'Pekerjaan') {
                                                $yplus2[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$yplus2[$k]}</th>";
                                            } else if ($k == 'Pendapatan') {
                                                $yplus3[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$yplus3[$k]}</th>";
                                            } else if ($k == 'Jumlah Tanggungan') {
                                                $yplus4[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$yplus4[$k]}</th>";
                                            } else if ($k == 'Status Tempat Tinggal') {
                                                $yplus5[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$yplus5[$k]}</th>";
                                            } else if ($k == 'Luas Tanah') {
                                                $yplus6[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$yplus6[$k]}</th>";
                                            } else if ($k == 'Jenis Penerangan') {
                                                $yplus7[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$yplus7[$k]}</th>";
                                            }
                                            $yplus[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Solusi Ideal negatif (A<sup>-</sup>)
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                </tr>
                                <tr>
                                    <?php
                                        foreach ($kriteria as $k)
                                            echo "<th>{$k}</th>\n";
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                        for ($n = 1; $n <= $jml_kriteria; $n++)
                                            echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $ymin = array();
                                        foreach ($kriteria as $k) {
                                            if ($k == 'Umur') {
                                                $ymin1[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$ymin1[$k]}</th>";
                                            } else if ($k == 'Pekerjaan') {
                                                $ymin2[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$ymin2[$k]}</th>";
                                            } else if ($k == 'Pendapatan') {
                                                $ymin3[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$ymin3[$k]}</th>";
                                            } else if ($k == 'Jumlah Tanggungan') {
                                                $ymin4[$k] = round([$k] ? min($y[$k]) : max($y[$k]), 3);
                                                echo "<th> {$ymin4[$k]}</th>";
                                            } else if ($k == 'Status Tempat Tinggal') {
                                                $ymin5[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$ymin5[$k]}</th>";
                                            } else if ($k == 'Luas Tanah') {
                                                $ymin6[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$ymin6[$k]}</th>";
                                            } else if ($k == 'Jenis Penerangan') {
                                                $ymin7[$k] = round([$k] ? max($y[$k]) : min($y[$k]), 3);
                                                echo "<th> {$ymin7[$k]}</th>";
                                            }
                                        }

                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Jarak positif (D<sub>i</sub><sup>+</sup>)
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    <th>Nama</th>
                                    <th>D<suo>+</sup></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        $i = 0;
                                        $dplus = 0;
                                        $tplus1 = 0;
                                        $tplus2 = 0;
                                        $tplus3 = 0;
                                        $tplus4 = 0;
                                        $tplus5 = 0;
                                        $tplus6 = 0;
                                        $tplus7 = 0;
                                        $dplus = array();
                                        $dplus1 = array();
                                        $dplus2 = array();
                                        $dplus3 = array();
                                        $dplus4 = array();
                                        $dplus5 = array();
                                        $dplus6 = array();
                                        $dplus7 = array();
                                        $dplus8 = array();
                                        $dplus9 = array();
                                        $dplus10 = array();
                                        $dplus11 = array();
                                        $dplus12 = array();
                                        $dplus13 = array();
                                        $dplus14 = array();

                                        foreach ($data as $nama => $krit) {
                                            echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";


                                            foreach ($kriteria as $k) {

                                                if ($k == 'Umur') {
                                                    $dplus1[$k] = ($bnefit1[$k][$i - 1]);
                                                    $dplus2[$k] = ($yplus1[$k]);
                                                    $tplus1 += pow($dplus1[$k] - $dplus2[$k], 2);
                                                } else if ($k == 'Pekerjaan') {
                                                    $dplus3[$k] = ($bnefit2[$k][$i - 1]);
                                                    $dplus4[$k] = ($yplus2[$k]);
                                                    $tplus2 += pow($dplus3[$k] - $dplus4[$k], 2);
                                                } else  if ($k == 'Pendapatan') {
                                                    $dplus5[$k] = ($bnefit3[$k][$i - 1]);
                                                    $dplus6[$k] = ($yplus3[$k]);
                                                    $tplus3 += pow($dplus5[$k] - $dplus6[$k], 2);
                                                } else if ($k == 'Jumlah Tanggungan') {
                                                    $dplus7[$k] = ($bnefit4[$k][$i - 1]);
                                                    $dplus8[$k] = ($yplus4[$k]);
                                                    $tplus4 += pow($dplus7[$k] - $dplus8[$k], 2);
                                                } else if ($k == 'Status Tempat Tinggal') {
                                                    $dplus9[$k] = ($bnefit5[$k][$i - 1]);
                                                    $dplus10[$k] = ($yplus5[$k]);
                                                    $tplus5 += pow($dplus9[$k] - $dplus10[$k], 2);
                                                } else if ($k == 'Luas Tanah') {
                                                    $dplus11[$k] = ($bnefit6[$k][$i - 1]);
                                                    $dplus12[$k] = ($yplus6[$k]);
                                                    $tplus6 += pow($dplus11[$k] - $dplus12[$k], 2);
                                                } else if ($k == 'Jenis Penerangan') {
                                                    $dplus13[$k] = ($bnefit7[$k][$i - 1]);
                                                    $dplus14[$k] = ($yplus7[$k]);
                                                    $tplus7 += pow($dplus13[$k] - $dplus14[$k], 2);
                                                }
                                                $dplus[$i - 1] = ($tplus1 + $tplus2 + $tplus3 + $tplus4 + $tplus5 + $tplus6 + $tplus7);
                                                //$tampung = $tampung + sqrt(pow($dplus1[$k] - $dplus2[$k], 2) + pow($dplus3[$k] - $dplus4[$k], 2) + pow($dplus5[$k] - $dplus6[$k], 2) + pow($dplus7[$k] - $dplus8[$k], 2) + pow($dplus9[$k] - $dplus10[$k], 2) + pow($dplus11[$k] - $dplus12[$k], 2) + pow($dplus13[$k] - $dplus14[$k], 2));
                                            }
                                            echo "<td>" . round(sqrt($dplus[$i - 1]), 9) . "</td>";
                                        }
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Jarak negatif (D<sub>i</sub><sup>-</sup>)
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    <th>Nama</th>
                                    <th>D<suo>-</sup></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $tmin1 = 0;
                                $tmin2 = 0;
                                $tmin3 = 0;
                                $tmin4 = 0;
                                $tmin5 = 0;
                                $tmin6 = 0;
                                $tmin7 = 0;
                                $dmin = array();
                                $dmin1 = array();
                                $dmin2 = array();
                                $dmin3 = array();
                                $dmin4 = array();
                                $dmin5 = array();
                                $dmin6 = array();
                                $dmin7 = array();
                                $dmin8 = array();
                                $dmin9 = array();
                                $dmin0 = array();
                                $dmin11 = array();
                                $dmin12 = array();
                                $dmin13 = array();
                                $dmin14 = array();
                                foreach ($data as $nama => $krit) {
                                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                    foreach ($kriteria as $k) {
                                        if ($k == 'Umur') {
                                            $dmin1[$k] = ($bnefit1[$k][$i - 1]);
                                            $dmin2[$k] = ($ymin1[$k]);
                                            $tmin1 = pow($dmin1[$k] - $dmin2[$k], 2);
                                        } else if ($k == 'Pekerjaan') {
                                            $dmin3[$k] = ($bnefit2[$k][$i - 1]);
                                            $dmin4[$k] = ($ymin2[$k]);
                                            $tmin2 = pow($dmin3[$k] - $dmin4[$k], 2);
                                        } else  if ($k == 'Pendapatan') {
                                            $dmin5[$k] = ($bnefit3[$k][$i - 1]);
                                            $dmin6[$k] = ($ymin3[$k]);
                                            $tmin3 = pow($dmin5[$k] - $dmin6[$k], 2);
                                        } else if ($k == 'Jumlah Tanggungan') {
                                            $dmin7[$k] = ($bnefit4[$k][$i - 1]);
                                            $dmin8[$k] = ($ymin4[$k]);
                                            $tmin4 = pow($dmin7[$k] - $dmin8[$k], 2);
                                        } else if ($k == 'Status Tempat Tinggal') {
                                            $dmin9[$k] = ($bnefit5[$k][$i - 1]);
                                            $dmin10[$k] = ($ymin5[$k]);
                                            $tmin5 = pow($dmin9[$k] - $dmin10[$k], 2);
                                        } else if ($k == 'Luas Tanah') {
                                            $dmin11[$k] = ($bnefit6[$k][$i - 1]);
                                            $dmin12[$k] = ($ymin6[$k]);
                                            $tmin6 = pow($dmin11[$k] - $dmin12[$k], 2);
                                        } else if ($k == 'Jenis Penerangan') {
                                            $dmin13[$k] = ($bnefit7[$k][$i - 1]);
                                            $dmin14[$k] = ($ymin7[$k]);
                                            $tampung7 = pow($dmin13[$k] - $dmin14[$k], 2);
                                        }
                                        $dmin[$i - 1] = ($tmin1 + $tmin2 + $tmin3 + $tmin4 + $tmin5 + $tmin6 + $tmin7);
                                    }
                                    echo "<td>" . round(sqrt($dmin[$i - 1]), 9) . "</td>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nilai Preferensi(V<sub>i</sub>)
                    </div>
                    <div class="panel-body">
                        <form action="tambahrangking" name="rangking">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nama</th>
                                        <th>V<sub>i</sub></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $Vmin1 = 0;
                                    $VPlus1 = 0;
                                    $V1 = array();
                                    $query = "TRUNCATE tab_rangking";
                                    $buat = $koneksi->query($query);

                                    foreach ($data as $nama => $krit) {
                                        echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                        foreach ($kriteria as $k) {
                                            $Vmin1 = round(sqrt($dmin[$i - 1]), 9);
                                            $VPlus1 = round(sqrt($dplus[$i - 1]), 9);
                                            $V1 = $Vmin1 / ($Vmin1 + $VPlus1);
                                        }
                                        echo "<td>" . round(($V1), 9) . "</td>";

                                        $tambah = $koneksi->query('SELECT * FROM tab_rangking');

                                        // if ($row = $tambah->fetch_row()) {

                                        //     $masuk = "INSERT INTO tab_rangking VALUES ('$i = id_alternatif ','$nama', '$V1 = nilai' )";
                                        //     $buat  = $koneksi->query($masuk);



                                        $query = "INSERT INTO tab_rangking VALUES (null,'$nama','$V1=nilai')";
                                        $buat = $koneksi->query($query);
                                    }


                                    ?>

                                </tbody>

                            </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--container-->



    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>


</html>