<?php 
require 'admin/functions.php';

    $tbl_mobil = tampilData("SELECT * FROM tbl_mobil");
    $tbl_mobil2 = tampilData("SELECT * FROM tbl_mobil LIMIT 0, 3");
    $tbl_user = tampilData("SELECT * FROM tbl_user LIMIT 0, 3");
    $tbl_paket = tampilData("SELECT * FROM tbl_paket LIMIT 0, 3");
    $tbl_test = tampilData("SELECT * FROM tbl_test LIMIT 0, 4");
    $tbl_slider = tampilData("SELECT * FROM tbl_slider");




    $conn = mysqli_connect("localhost", "root", "", "rental");

    $data_tabel = mysqli_query($conn, "SELECT * FROM tbl_slider WHERE id_slider = 1");
    $data_foto = mysqli_fetch_assoc($data_tabel);

    $data_tabel2 = mysqli_query($conn, "SELECT * FROM tbl_slider WHERE id_slider = 2");
    $data_foto2 = mysqli_fetch_assoc($data_tabel2);

    $data_tabel3 = mysqli_query($conn, "SELECT * FROM tbl_slider WHERE id_slider = 3");
    $data_foto3 = mysqli_fetch_assoc($data_tabel3);


    if( isset($_POST["pesan"]) ){

        $nomor = $_POST["nomor"];
        $nama = $_POST["nama"];
        $tlp = $_POST["tlp"];
        $alamat = $_POST["alamat"];
        $date = $_POST["date"];
        $mobil = $_POST["mobil"];
    
        $data = "Nama : $nama No.Telepon : $tlp Alamat : $alamat Tanggal : $date Mobil : $mobil";
    
    
        if($date !==null){
            header("Location: https://wa.me/$nomor?text=$data");
            exit;
        }
    
    
    }

    


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velozytrip.com</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=greek,cyrillic,cyrillic-ext,greek-ext">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="#ganti">
        <div class="container">
            <a class="navbar-brand" href="#">
                ,<img class="imgbren" src="assets/img/NAV2.png" alt="">
                <!-- <p>VELOZYTRIP</p>
                <p class="sub_title">Rent car & tour guide</p> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars merah"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pesan">Pesan mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#armada">Armada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket">Paket wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#test">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak kami</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-link" id="google_translate_element"></div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/img/<?= $data_foto["foto"] ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/img/<?= $data_foto2["foto"] ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/img/<?= $data_foto3["foto"] ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container" id="pesan">
        <div class="card-body"></div>
        <h4>Pesan Mobil</h4>
        <hr>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-md-6">
                    <?php foreach( $tbl_user as $row) : ?>
                    <input type="hidden" class="form-control" name="nomor" value="<?= $row["wa"] ?>">
                    <?php endforeach; ?>
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-md-6">
                    <label>No.Telepon</label>
                    <input type="number" class="form-control" name="tlp">
                </div>
                <div class="col-md-6">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="col-md-6">
                    <label>Armada</label>
                    <select class="form-control" name="mobil">
                        <?php foreach( $tbl_mobil as $row) : ?>
                        <option><?= $row["nama_mobil"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Alamat</label>
                    <textarea class="form-control" name="" rows="3" name="alamat"></textarea>
                </div>
            </div>
            <hr>
            <button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
        </form>
    </div>


    <div class="section1" id="armada">
        <div class="container">
            <h4>Armada</h4>
            <hr>
            <div class="row">
                <?php foreach( $tbl_mobil2 as $row) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="assets/img/<?= $row ["foto"] ?>" onclick="window.open(this.src)">
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
            <a class="btn btn-primary" href="page/mobil.php" role="button">Lihat daftar mobil</a>
        </div>
    </div>


    <div class="section1" id="paket">
        <div class="container">
            <h4>Paket Wisata</h4>
            <hr>
            <div class="row">
                <?php foreach( $tbl_paket as $row) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-paket" src="assets/img/<?= $row["foto"] ?>"
                            onclick="window.open(this.src)">
                        <div class="card-body">
                            <small class="center"><?= $row["caption"] ?></small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <a class="btn btn-primary" href="page/paket.php" role="button">Lihat daftar Paket</a>
        </div>
    </div>



    <div class="section1 bg_selection" id="test">
        <div class="container">
            <h4 class="putih">Testimoni</h4>
            <hr class="putih">
            <div class="row">
                <?php foreach( $tbl_test as $row) : ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-paket" src="assets/img/<?= $row["foto"] ?>"
                            onclick="window.open(this.src)">
                        <div class="card-body">
                            <small class="center"><?= $row["caption"] ?></small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <a class="btn btn-primary" href="page/test.php" role="button">Lihat daftar testimoni</a>

        </div>
    </div>

    <div class="section1" id="kontak">
        <div class="container">
            <h4>Tentang Kami</h4>
            <hr>
            <div class="row">
                <?php foreach( $tbl_user as $row) : ?>
                <div class="col-md-6">
                    <img class="imglogo" src="assets/img/<?= $row["foto"] ?>">
                </div>
                <div class="col-md-6">
                    <h3><?= $row["nama_user"] ?></h3>
                    <p><?= $row["deskripsi"] ?></p>

                    <p class="text_bold_p"><span class="fa fa-google  merah margin_left"></span> <?= $row["email"] ?>
                    </p>
                    <p class="text_bold_p"><span class="fa fa-facebook  merah margin_left"></span> <?= $row["fb"] ?></p>
                    <p class="text_bold_p"><span class="fa fa-instagram  merah margin_left"></span> <?= $row["ig"] ?>
                    </p>
                    <p class="text_bold_p"><span class="fa fa-whatsapp  merah margin_left"></span> <?= $row["wa"] ?></p>


                </div>
                <?php endforeach; ?>
            </div>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="300px" id="gmap_canvas"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.272146222771!2d98.67222381475837!3d3.524462997434991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313b3565e40ded%3A0x71f61c74ea7ba33!2sANTRI%20Rent%20Car%20Medan!5e0!3m2!1sen!2sid!4v1611040452504!5m2!1sen!2sid"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://fmovies2.org"></a>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <footer>
            <?php foreach( $tbl_user as $row) : ?>
            <label><?= $row["alamat"] ?></label>
            <?php endforeach; ?>
            <h6>©2021 copyright antrirentcar.com</h6>
        </footer>
    </div>

    <?php foreach( $tbl_user as $row) : ?>
    <a class="float" target="_blank" href="https://wa.me/<?= $row["wa"] ?>?text=Halo kak...">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    <?php endforeach; ?>


    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>





    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
