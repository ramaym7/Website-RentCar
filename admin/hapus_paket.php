<?php 
require 'functions.php';

$id_paket = $_GET["id_paket"];

if (hapusPaket($id_paket) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus...');
                document.location.href = 'myadmin.php';
            </script>
        ";
    }
?>