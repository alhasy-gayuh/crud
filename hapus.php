<?php

require 'koneksi.php';

$no_tlp = $_GET["no_tlp"];

if( hapus($no_tlp) > 0){
    echo "
            <script>
                alert('Data Berhasil di hapus');
                document.location.href = 'admin/index.php'
            </script>
        ";
}else{
    echo "
            <script>
                alert('Data gagal di hapus');
                document.location.href = 'admin/index.php'
            </script>
        ";
}

?>