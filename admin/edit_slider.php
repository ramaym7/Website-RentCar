 <?php

    require 'functions.php';

    $id_slider = $_GET["id_slider"];
    $tbl_slider = tampilData("SELECT * FROM tbl_slider WHERE id_slider = $id_slider")[0];

    if( isset($_POST["submit"]) ){
    
        if (editSlider ($_POST) > 0 ){
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
                    <input type="hidden" name="id_slider" value="<?= $tbl_slider["id_slider"] ?>">
                    <input type="hidden" name="gambarLama" value="<?= $tbl_slider["foto"] ?>">
                        <small>Foto 1</small>
                        <input type="file" class="form-control" name="foto">
                    <button type="submit" name="submit" class="btn btn-primary">Ubah data</button>
                </form>
            </div>
        </div>

        <div class="col-md-5 ">
            <div class="card-body card">
                <img src="..//assets//img//<?= $tbl_slider["foto"] ?>" width="150px" height="150px" style="margin: auto;"
                    class="rounded-circle" />
            </div>
        </div>

    </div>
</div>


<?php require 'footer.php' ?>