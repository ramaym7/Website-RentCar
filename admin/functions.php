<?php 
    $conn = mysqli_connect("localhost", "root", "", "rental");

    function tampilData($query){
        global $conn;
    
        $result = mysqli_query($conn, $query);
        $rows = [];
        
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    
        return $rows;
        
    }


    function upload(){

        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];
    
        // cek tidak ada gambar
    
        if( $error === 4 ){
            echo "
                <script>
                    alert('Silahkan pilih gambar!');
                </script>
            ";
            return false;
        }
    
        // cek apakah yg di upload foto
        $extensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstesiGambar = explode('.', $namaFile);
        $ekstesiGambar = strtolower(end($ekstesiGambar));
        if( !in_array($ekstesiGambar, $extensiGambarValid)){
            echo "
                <script>
                    alert('yang anda upload bukan gambar!');
                </script>
            ";
    
            return false;
        }
    
        // cek jika ukuranya terlalu besar
        if($ukuranFile > 1000000){
            echo "
            <script>
                alert('Gambar maksimal 1MB');
            </script>
        ";
    
        return false;
        }
    
        // lolos pengecekan , gambar siap diupload
        // generate nama file baru
    
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstesiGambar;
    
    
        move_uploaded_file($tmpName, '../assets/img/'.$namaFileBaru);
    
        return $namaFileBaru;
    
    }

    function tambahMobil($data) {

        global $conn;
    
        $nama_mobil = htmlspecialchars($data["nama_mobil"]);
        $tipe_mobil = htmlspecialchars($data["tipe_mobil"]);
        $warna_mobil = htmlspecialchars($data["warna_mobil"]);
        $kota = htmlspecialchars($data["kota"]);
        $sumut = htmlspecialchars($data["sumut"]);
        $l_sumut = htmlspecialchars($data["l_sumut"]);
        
    
        $foto = upload();
        if( !$foto){
            return false;
        }
    
        $query = "INSERT INTO tbl_mobil
                    VALUES
                    ('', '$nama_mobil', '$tipe_mobil', '$warna_mobil', '$kota', '$sumut', '$l_sumut', '$foto');
                ";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }

    function hapusMobil($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tbl_mobil WHERE id_mobil = $id");
        return mysqli_affected_rows($conn);
    }

function editMobil($data) {

    global $conn;

    $id_mobil = $data["id_mobil"];
    $nama_mobil = htmlspecialchars($data["nama_mobil"]);
    $tipe_mobil = htmlspecialchars($data["tipe_mobil"]);
    $warna_mobil = htmlspecialchars($data["warna_mobil"]);
    $kota = htmlspecialchars($data["kota"]);
    $sumut = htmlspecialchars($data["sumut"]);
    $l_sumut = htmlspecialchars($data["l_sumut"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE tbl_mobil SET
                nama_mobil = '$nama_mobil',
                tipe_mobil = '$tipe_mobil',
                warna_mobil = '$warna_mobil',
                kota = '$kota',
                sumut = '$sumut',
                l_sumut = '$l_sumut',
                foto = '$foto'
                WHERE id_mobil = $id_mobil;
            ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);



}

function editProfil($data) {

    global $conn;

    $id_user = $data["id_user"];
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    $fb = htmlspecialchars($data["fb"]);
    $ig = htmlspecialchars($data["ig"]);
    $wa = htmlspecialchars($data["wa"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE tbl_user SET
                nama_user = '$nama_user',
                email = '$email',
                fb = '$fb',
                ig = '$ig',
                wa = '$wa',
                alamat = '$alamat',
                deskripsi = '$deskripsi',
                foto = '$foto'
                WHERE id_user = $id_user;
            ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}


function tambahPaket($data) {

    global $conn;

    $caption = htmlspecialchars($data["caption"]);
    

    $foto = upload();
    if( !$foto){
        return false;
    }

    $query = "INSERT INTO tbl_paket
                VALUES
                ('', '$caption', '$foto');
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahTest($data) {

    global $conn;

    $caption = htmlspecialchars($data["caption"]);
    

    $foto = upload();
    if( !$foto){
        return false;
    }

    $query = "INSERT INTO tbl_test
                VALUES
                ('', '$caption', '$foto');
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPaket($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_paket WHERE id_paket = $id");
    return mysqli_affected_rows($conn);
}

function hapusTest($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_test WHERE id_test = $id");
    return mysqli_affected_rows($conn);
}


function editSlider($data) {

    global $conn;

    $id_slider = $data["id_slider"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE tbl_slider SET
                foto = '$foto'
                WHERE id_slider = $id_slider;
            ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

?>