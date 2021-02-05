<?php 

session_start();

if( isset($_SESSION["login"])){
    header("Location: myadmin.php");
    exit;
}

$usr = "admin";
$psw = "admin123";

if( isset($_POST["submit"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == $usr && $password == $psw){

        $_SESSION["login"] = true;
        echo "
        <script>
            alert('login berhasil');
            document.location.href = 'myadmin.php';
        </script>
    ";
    }else{
        echo "
        <script>
            alert('Username atau password anda salah');
            document.location.href = 'login.php';
        </script>
    ";
    }

}


?>


<?php require 'body.php' ?>

<div class="container" style="margin-top: 50px;">
        <div class="card-body card">
            <div class="row">
                <div class="col-md-6 hilang">
                    <img src="../assets/img/logo.jpg" class="img-fluid ">
                </div>
                <div class="col-md-6">
                    <h4>Selamat datang admin</h4>
                    <small>Masuk untuk melanjutkan</small>
                    <hr>

                    <form action="" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" required="" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" required="" placeholder="Password" name="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Masuk</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

<?php require 'footer.php' ?>