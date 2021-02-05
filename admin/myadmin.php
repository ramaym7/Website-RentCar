<?php 

session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
    require 'functions.php';
    require 'modal.php';

    
    $tbl_mobil = tampilData("SELECT * FROM tbl_mobil");
    $tbl_user = tampilData("SELECT * FROM tbl_user");
    $tbl_paket = tampilData("SELECT * FROM tbl_paket");
    $tbl_test = tampilData("SELECT * FROM tbl_test");
    $tbl_slider = tampilData("SELECT * FROM tbl_slider");
    
    
    // $conn = mysqli_connect("localhost", "root", "", "rental");
    // $id = 3;
    // $data_tabel = mysqli_query($conn, "SELECT * FROM tbl_slider WHERE id_slider = $id");
    // $data_foto = mysqli_fetch_assoc($data);
    // var_dump($data_foto["foto"]); die;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=greek,cyrillic,cyrillic-ext,greek-ext">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background-color: #f3f3f3;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="#ganti">
        <div class="container">
            <a class="navbar-brand" href="#">
                ,<img class="imgbren" src="../assets/img/NAV2.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars putih"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Lihat Website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <!-- Mobil -->
            <div class="col-md-6 ">
                <div class="card-body card">
                    <h6>Data Mobil</h6>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modalMobil">Tambah mobil</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Tabel Mobil</caption>
                            <thead>
                                <tr>
                                    <th style="width:80px;">Foto</th>
                                    <th>Armada</th>
                                    <th>Tarif</th>
                                    <th>Warna</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $tbl_mobil as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="../assets/img/<?= $row ["foto"] ?>" width="60px" height="60px"
                                            class="rounded-circle" />
                                    </td>
                                    <td>
                                        <p><?= $row ["nama_mobil"] ?></p>
                                        <small><?= $row ["tipe_mobil"] ?></small>
                                    </td>
                                    <td>
                                        <p><?= $row ["kota"] ?></p>
                                    </td>
                                    <td><?= $row ["warna_mobil"] ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary btn-sm"
                                            href="edit_mobil.php?id_mobil= <?= $row ["id_mobil"] ?>"
                                            role="button">Detail</a>
                                    </td>
                                </tr>
                                <tr></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-md-6 ">
                <div class="card-body card">
                    <h6>Data Profil</h6>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Tabel Profil</caption>
                            <thead>
                                <tr>
                                    <th style="width:80px;">Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>WhatAPP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $tbl_user as $row) : ?> 
                                <tr>
                                    <td>
                                        <img src="../assets/img/<?= $row["foto"] ?>" width="60px" height="60px"
                                            class="rounded-circle" />
                                    </td>
                                    <td>
                                        <p><?= $row["nama_user"] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row["email"] ?></p>
                                    </td>
                                    <td><?= $row["wa"] ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="edit_profil.php?id_user= <?= $row["id_user"] ?>" role="button">Detail</a>
                                    </td>
                                </tr>
                                <tr></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-md-6 ">
                <div class="card-body card">
                    <h6>Data Paket Wisata</h6>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modalPaket">Tambah Paket</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Tabel Paket Wisata</caption>
                            <thead>
                                <tr>
                                    <th style="width:80px;">Foto</th>
                                    <th>Caption</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $tbl_paket as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="../assets/img/<?= $row["foto"] ?>" width="60px" height="60px"
                                            class="rounded-circle" />
                                    </td>
                                    <td>
                                        <p><?= $row["caption"] ?></p>
                                    </td>
                                    <td>
                                        <a name="" id="" class="btn btn-danger btn-sm" href="hapus_paket.php?id_paket= <?= $row["id_paket"] ?>" onclick="
                                return confirm('Apakah yakin data ini dihapus');">Hapus</a>
                                    </td>
                                </tr>
                                <tr></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="card-body card">
                    <h6>Data Testimoni</h6>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modalTest">Tambah Testimoni</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Tabel Testimoni</caption>
                            <thead>
                                <tr>
                                    <th style="width:80px;">Foto</th>
                                    <th>Caption</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $tbl_test as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="../assets/img/<?= $row["foto"] ?>" width="60px" height="60px"
                                            class="rounded-circle" />
                                    </td>
                                    <td>
                                        <p><?= $row["caption"] ?></p>
                                    </td>
                                    <td>
                                        <a name="" id="" class="btn btn-danger btn-sm" href="hapus_test.php?id_test= <?= $row["id_test"] ?>" onclick="
                                return confirm('Apakah yakin data ini dihapus');">Hapus</a>
                                    </td>
                                </tr>
                                <tr></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6 ">
                <div class="card-body card">
                    <h6>Data Slider </h6>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Data Slider</caption>
                            <thead>
                                <tr>
                                    <th style="width:80px;">Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $tbl_slider as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="../assets/img/<?= $row["foto"] ?>" width="60px" height="60px"
                                            class="rounded-circle" />
                                    </td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="edit_slider.php?id_slider= <?= $row["id_slider"] ?>" >Ubah</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>



    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>