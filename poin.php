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
                        Bobot
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="poin.php" data-toggle="tab">Tabel Bobot</a>
                        </li>
                        <li>
                            <a href="pointambah.php" data-toggle="tab">Tambah Bobot</a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="">
                                <!--tabel poin-->
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Bobot</th>
                                            <th>Bobot</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $koneksi->query('SELECT * FROM tab_poin');
                                        while ($row = $sql->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                                <td align="center"><a href="editpoin.php?id_poin=<?php echo $row['id_poin'] ?>"><i class="fa fa-edit fa-fw"></i> </td>
                                                <td align="center"><a href="hapuspoin.php?id_poin=<?php echo $row['id_poin'] ?>"><i class="fa fa-trash fa-fw"></i> </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                <!--tabel poin-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>