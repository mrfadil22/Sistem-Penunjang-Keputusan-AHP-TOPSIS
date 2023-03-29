<?php
include('config.php');
include('fungsi.php');
include('header_lurah.php');

?>


<section class="content">

    <h2 class="ui header">Alternatif</h2>

    <table class="ui celled table">
        <thead>
            <tr>
                <th class="collapsing">No</th>
                <th colspan="2">Nama Alternatif</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Menampilkan list alternatif
            $query = "SELECT id_alternatif,nama_alternatif FROM tab_alternatif ORDER BY id_alternatif";
            $result    = mysqli_query($koneksi, $query);

            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['nama_alternatif'] ?></td>
                    <td class="right aligned collapsing">
                        <form method="post" action="alternatif.php">
                            <input type="hidden" name="id" value="<?php echo $row['id_alternatif'] ?>">
                        </form>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <br>


    <form action="laporan.php">
        <button class="ui right labeled icon button" style="float: right;">
            <i class="right arrow icon"></i>
            Lanjut
        </button>
    </form>
</section>

<?php include('footer.php'); ?>