<?php
include('config.php');
include('fungsi.php');

include('header_lurah.php');

?>

<section class="content">
    <h2 class="ui header">Kriteria</h2>

    <table class="ui celled table">
        <thead>
            <tr>
                <th class="collapsing">No</th>
                <th>Nama Kriteria</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Menampilkan list kriteria
            $query = "SELECT id_kriteria,nama_kriteria FROM tab_kriteria ORDER BY id_kriteria";
            $result    = mysqli_query($koneksi, $query);

            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['nama_kriteria'] ?></td>
                    <td class="right aligned collapsing">
                        <form method="post" action="kriteria.php">
                            <input type="hidden" name="id" value="<?php echo $row['id_kriteria'] ?>">
                            <button type="submit" name="edit" class="ui mini teal left labeled icon button"><i class="right edit icon"></i>EDIT</button>
                            <button type="submit" name="delete" class="ui mini red left labeled icon button"><i class="right remove icon"></i>DELETE</button>
                        </form>
                    </td>
                </tr>


            <?php } ?>


        </tbody>
    </table>

    <br>



    <form action="alternatif.php">
        <button class="ui right labeled icon button" style="float: right;">
            <i class="right arrow icon"></i>
            Lanjut
        </button>
    </form>

</section>

<?php include('footer.php'); ?>