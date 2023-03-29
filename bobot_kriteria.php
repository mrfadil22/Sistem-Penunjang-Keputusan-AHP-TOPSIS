<?php
include('config.php');
include('fungsi.php');

include('header.php');
?>
<section class="content">
    <h2 class="ui header">Perbandingan Kriteria</h2>
    <?php showTabelPerbandingan('tab_kriteria', 'tab_kriteria'); ?>
</section>

<?php include('footer.php'); ?>