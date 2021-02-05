 <?php 
 
 if( isset($_POST["submitMobil"]) ){
    
    if (tambahMobil ($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil ditambahkan...');
                document.location.href = 'myadmin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan...');
            </script>
        ";
    }
}

if( isset($_POST["submitPaket"]) ){
    
    if (tambahPaket ($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil ditambahkan...');
                document.location.href = 'myadmin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan...');
            </script>
        ";
    }
}

if( isset($_POST["submitTest"]) ){
    
    if (tambahTest ($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil ditambahkan...');
                document.location.href = 'myadmin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan...');
            </script>
        ";
    }
}
 
 ?>
 
 <!-- Modal Mobil -->
 <div class="modal fade" id="modalMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <small>Armada</small>
                            <input type="text" class="form-control" name="nama_mobil">
                        </div>
                        <div class="form-group">
                            <small>Transmisi</small>
                            <input type="text" class="form-control" name="tipe_mobil">
                        </div>
                        <div class="form-group">
                            <small>Warna</small>
                            <input type="text" class="form-control" name="warna_mobil">
                        </div>
                        <div class="form-group">
                            <small>Kota</small>
                            <input type="text" class="form-control" name="kota">
                        </div>
                        <div class="form-group">
                            <small>Sumut</small>
                            <input type="text" class="form-control" name="sumut">
                        </div>
                        <div class="form-group">
                            <small>Luar Sumut</small>
                            <input type="text" class="form-control" name="l_sumut">
                        </div>
                        <div class="form-group">
                            <small>Foto</small>
                            <input type="file" accept="image/*" class="form-control" name="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="submitMobil" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Paket -->
    <div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <small>Caption</small>
                            <input type="text" class="form-control" name="caption">
                        </div>
                        <div class="form-group">
                            <small>Foto</small>
                            <input type="file" accept="image/*" class="form-control" name="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="submitPaket" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Test -->
    <div class="modal fade" id="modalTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <small>Caption</small>
                            <input type="text" class="form-control" name="caption">
                        </div>
                        <div class="form-group">
                            <small>Foto</small>
                            <input type="file" accept="image/*" class="form-control" name="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="submitTest" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>