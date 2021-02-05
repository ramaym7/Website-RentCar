<?php

    require 'functions.php';

    $id_mobil = $_GET["id_mobil"];
    $tbl_mobil = tampilData("SELECT * FROM tbl_mobil WHERE id_mobil = $id_mobil")[0];

    if( isset($_POST["submit"]) ){
    
        if (editMobil ($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diubah...');
                    document.location.href = 'myadmin.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal diubah...');
                </script>
            ";
        }
    }


    if ( isset($_POST["hapus"]) ) {
        if (hapusMobil($id_mobil) > 0) {
            echo "
                <script>
                    alert('data berhasil dihapus...');
                    document.location.href = 'myadmin.php';
                </script>
            ";
        }
    }


?>


<?php require 'body.php' ?>

<br>
<div class="container">
    <div class="row">
        <div class="col-md-7 ">
            <div class="card-body card">
                <h6>Ubah data mobil</h6>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mobil" value="<?= $tbl_mobil["id_mobil"] ?>">
                <input type="hidden" name="gambarLama" value="<?= $tbl_mobil["foto"] ?>">
                    <div class="form-group">
                        <small>Armada</small>
                        <input type="text" class="form-control" name="nama_mobil" value="<?= $tbl_mobil[ "nama_mobil"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Transmisi</small>
                        <input type="text" class="form-control" name="tipe_mobil" value="<?= $tbl_mobil[ "tipe_mobil"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Warna</small>
                        <input type="text" class="form-control" name="warna_mobil" value="<?= $tbl_mobil[ "warna_mobil"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Kota</small>
                        <input type="text" class="form-control" name="kota" value="<?= $tbl_mobil[ "kota"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Sumut</small>
                        <input type="text" class="form-control" name="sumut" value="<?= $tbl_mobil[ "sumut"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Luar Sumut</small>
                        <input type="text" class="form-control" name="l_sumut" value="<?= $tbl_mobil[ "l_sumut"] ?>">
                    </div>
                    <div class="form-group">
                    <small>Foto</small>
                        <input type="file" class="form-control" name="foto">
                    </div>
            <button type="submit" name="submit" class="btn btn-primary">Ubah data</button>
                </form>
            </div>
        </div>

        <div class="col-md-5 ">
            <div class="card-body card">
            <img src="..//assets//img//<?= $tbl_mobil["foto"] ?>" width="150px" height="150px" style="margin: auto;"
            class="rounded-circle" />
            <hr>
            <h6>Armada : <?= $tbl_mobil[ "nama_mobil"] ?></h6>
            <h6>Transmisi : <?= $tbl_mobil[ "tipe_mobil"] ?></h6>
            <h6>Warna : <?= $tbl_mobil[ "warna_mobil"] ?></h6>
            <small>Tarif</small>
            <h6>Kota : <?= $tbl_mobil[ "kota"] ?></h6>
            <h6>Sumut : <?= $tbl_mobil[ "sumut"] ?></h6>
            <h6>L. Sumut : <?= $tbl_mobil[ "l_sumut"] ?></h6>
            <br>
            <form action="" method="post">
            <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
            </form>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.php' ?>