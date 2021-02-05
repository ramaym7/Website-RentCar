<?php 
require 'functions.php';

$id_test = $_GET["id_test"];

if (hapusTest($id_test) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus...');
                document.location.href = 'myadmin.php';
            </script>
        ";
    }
?>