<?php 
require '../admin/functions.php';

    $tbl_mobil = tampilData("SELECT * FROM tbl_mobil");



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velozytrip.com</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=greek,cyrillic,cyrillic-ext,greek-ext">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>



<div class="section1" id="armada">
        <div class="container">
            <h4>Armada</h4>
            <hr>
            <div class="row">
            <?php foreach( $tbl_mobil as $row) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="../assets/img/<?= $row ["foto"] ?>" onclick="window.open(this.src)">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row ["nama_mobil"] ?></h5>
                            <label><?= $row ["tipe_mobil"] ?></label>
                            <label> | </label>
                            <label><?= $row ["warna_mobil"] ?></label>
                            <hr>
                            <br>
                            <p class="txt_tarif"><?= $row ["kota"] ?> ,- / Kota</p>
                            <p class="txt_tarif"><?= $row ["sumut"] ?> ,- / Sumut</p>
                            <p class="txt_tarif"><?= $row ["l_sumut"] ?> ,- / Luar Sumut</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>





<script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
