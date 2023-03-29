<?php
include('config.php');
include('fungsi.php');
include('header.php');
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
                        Kriteria
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="kriteria_topsis.php" data-toggle="tab">Tabel Kriteria</a>
                        </li>
                    </ul>

                    <!-- <div class="panel-body"> -->
                    <!-- Tab panes -->
                    <!-- <div class="tab-content">
                            <div class=""> -->
                    <!--tabel kriteria-->
                    <!-- <table class="table table-striped table-bordered table-hover">
                                    <tbody> -->
                    <!-- <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12"> -->
                    <!-- <form class="form" action="tambahkriteriatopsis.php" method="post">
                                                        <div class="form-group">
                                                            <select class="form-control" name="krit">
                                                                <option>Nama Kriteria</option>
                                                                <?php
                                                                //ambil data dari database
                                                                // $krit = $koneksi->query('SELECT * FROM tab_kriteria ORDER BY nama_kriteria');
                                                                // while ($datakrit = $krit->fetch_array()) {
                                                                //     echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                                                                // }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="nilai">
                                                                <option>Nilai</option>
                                                                <?php
                                                                //ambil data dari database
                                                                $bobot = $koneksi->query('SELECT * FROM pv_kriteria ORDER BY nilai');
                                                                while ($databobot = $bobot->fetch_array()) {
                                                                    echo "<option value=\"$databobot[id_kriteria]\">$databobot[nilai]</option>\n";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success">Proses</button>
                                                        </div>
                                                    </form> -->
                    <!-- </div>
                                            </div>
                                        </div> -->
                    <!-- </div>
                        </div> -->

                    <div class="panel-body">
                        <?php
                        //pemanggilan data, matra dan pangkat
                        $sql = $koneksi->query("SELECT * FROM tab_kriteria
                        JOIN pv_kriteria ON tab_kriteria.id_kriteria=pv_kriteria.id_kriteria")
                        ?>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KRITERIA</th>
                                    <th>BOBOT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                //menampilkan data
                                while ($row = $sql->fetch_array()) {
                                    $nmkriteria   = $row['nama_kriteria'];
                                    echo ("<tr><td align=\"center\">" . $no . "</td>");
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
    </tbody>
    </table>
    <!--tabel kriteria-->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>