<?php
include('config.php');
include('fungsi.php');

include('header_lurah.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistem Pendukung Keputusan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>

<body>

    <section class="content">
        <h2 class="ui header">Selamat Datang Di Sistem Penunjang Keputusan Metode AHP - TOPSIS\</h2>

        <h3 class="ui header">Tabel Tingkat Kepentingan menurut Saaty (1980)</h3>
        <table class="ui collapsing striped blue table">
            <thead>
                <tr>
                    <th>Nilai Numerik</th>
                    <th>Tingkat Kepentingan <em>(Preference)</em></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center aligned">1</td>
                    <td>Sama pentingnya <em>(Equal Importance)</em></td>
                </tr>
                <tr>
                    <td class="center aligned">2</td>
                    <td>Sama hingga sedikit lebih penting</td>
                </tr>
                <tr>
                    <td class="center aligned">3</td>
                    <td>Sedikit lebih penting <em>(Slightly more importance)</em></td>
                </tr>
                <tr>
                    <td class="center aligned">4</td>
                    <td>Sedikit lebih hingga jelas lebih penting</td>
                </tr>
                <tr>
                    <td class="center aligned">5</td>
                    <td>Jelas lebih penting <em>(Materially more importance)</em></td>
                </tr>
                <tr>
                    <td class="center aligned">6</td>
                    <td>Jelas hingga sangat jelas lebih penting</td>
                </tr>
                <tr>
                    <td class="center aligned">7</td>
                    <td>Sangat jelas lebih penting <em>(Significantly more importance)</em></td>
                </tr>
                <tr>
                    <td class="center aligned">8</td>
                    <td>Sangat jelas hingga mutlak lebih penting</td>
                </tr>
                <tr>
                    <td class="center aligned">9</td>
                    <td>Mutlak lebih penting <em>(Absolutely more importance)</em></td>
                </tr>
            </tbody>
        </table>

    </section>

    <?php include('footer.php'); ?>