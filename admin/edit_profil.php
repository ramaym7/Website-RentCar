 <?php

    require 'functions.php';

    $id_user = $_GET["id_user"];
    $tbl_user = tampilData("SELECT * FROM tbl_user WHERE id_user = $id_user")[0];

    if( isset($_POST["submit"]) ){
    
        if (editProfil ($_POST) > 0 ){
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
                    <input type="hidden" name="id_user" value="<?= $tbl_user["id_user"] ?>">
                    <input type="hidden" name="gambarLama" value="<?= $tbl_user["foto"] ?>">
                    <div class="form-group">
                        <small>Nama</small>
                        <input type="text" class="form-control" name="nama_user"
                            value="<?= $tbl_user[ "nama_user"] ?>">
                    </div>
                    <div class="form-group">
                        <small>Email</small>
                        <input type="text" class="form-control" name="email"
                            value="<?= $tbl_user[ "email"] ?>">
                    </div>
                    <div class="form-group">
                        <small>Facebook</small>
                        <input type="text" class="form-control" name="fb"
                            value="<?= $tbl_user[ "fb"] ?>">
                    </div>
                    <div class="form-group">
                        <small>ig</small>
                        <input type="text" class="form-control" name="ig" value="<?= $tbl_user[ "ig"] ?>">
                    </div>
                    <div class="form-group">
                        <small>WA</small>
                        <input type="text" class="form-control" name="wa" value="<?= $tbl_user[ "wa"] ?>">
                    </div>
                    <div class="form-group">
                        <small>alamat</small>
                        <input type="text" class="form-control" name="alamat" value="<?= $tbl_user[ "alamat"] ?>">
                    </div>
                    <div class="form-group">
                        <small>Deskripsi</small>
                        <textarea class="form-control" name="deskripsi" cols="30" rows="10"><?= $tbl_user[ "deskripsi"] ?></textarea>
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
                <img src="..//assets//img//<?= $tbl_user["foto"] ?>" width="150px" height="150px" style="margin: auto;"
                    class="rounded-circle" />
                <hr>
                <h6>Nama : <?= $tbl_user[ "nama_user"] ?></h6>
                <h6>Email : <?= $tbl_user[ "email"] ?></h6>
                <h6>Facebook : <?= $tbl_user[ "fb"] ?></h6>
                <h6>Instagram : <?= $tbl_user[ "ig"] ?></h6>
                <h6>WhatApp : <?= $tbl_user[ "wa"] ?></h6>
                <h6>alamat : <?= $tbl_user[ "alamat"] ?></h6>
                <h6>Deskripsi : <?= $tbl_user[ "deskripsi"] ?></h6>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.php' ?>