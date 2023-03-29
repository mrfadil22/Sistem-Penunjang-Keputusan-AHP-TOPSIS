<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistem Pendukung Keputusan metode AHP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>

<body>
    <header>
        <h1>Sistem Pendukung Keputusan</h1>
    </header>

    <div class="wrapper">
        <nav id="navigation" role="navigation">
            <ul>
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
                <li><a class="item" href="bobot.php">Nilai Matrix</a></li>
                <li><a class="item" href="hastop.php">Hasil</a></li>
                <li><a class="item" href="laporan.php">Laporan</a></li>
                <li><a class="item" href="logout.php">Log-out</a></li>
            </ul>
        </nav>