<?php
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis'])) {
    $jenis    = $_GET['jenis'];
}

if (isset($_POST['tambah'])) {
    $jenis    = $_POST['jenis'];
    $nama     = $_POST['nama'];

    tambahDataKriteria($jenis, $nama);

    header('Location: ' . $jenis . '.php');
}

include('header.php');
?>

<section class="content">
    <h2>Tambah <?php echo $jenis ?></h2>

    <form class="ui form" method="post" action="tambahkriteria.php">
        <div class="inline field">
            <label>Nama <?php echo $jenis ?></label>
            <input type="text" name="nama" placeholder="<?php echo $jenis ?> baru">
            <input type="hidden" name="jenis" value="<?php echo $jenis ?>">
        </div>
        <br>
        <input class="ui green button" type="submit" name="tambah" value="SIMPAN">
    </form>
</section>

<?php include('footer.php'); ?>
<!-- <section class="content">
    <h2> Tambah Data Kriteria</h2>
    <form class="ui form" name="input" method="POST" action="kriteria_input.php">
        <div class="inline field">
            <label for="nama">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" placeholder="nama" required>
        </div>
        <br>
        <input class="ui green button" type="submit" name="tambah" value="SIMPAN">
    </form>
</section> -->