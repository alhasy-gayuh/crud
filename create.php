<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: admin/login.php");
    exit;
}

require 'koneksi.php';

if( isset($_POST["submit"]) ){
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil di tambahkan');
                document.location.href = 'admin/index.php'
            </script>
        ";

    }else{
        echo "
        <script>
            alert('Data Gagal di Tambah');
            document.location.href = 'admin/index.php'
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Input Data</title>
</head>

<body>
    <h1>Tambah Nama Alumni PMII Jombang</h1>
    <form action="" method="post">
        <ul>
            <label for="nama">Masukkan Nama: </label>
            <input type="text" name="nama" id="nama" required>
        </ul>
        <ul>
            <label for="tlpn">No Telepon: </label>
            <input type="number" name="tlpn" id="tlpn">
        </ul>
        <ul>
            <label for="komis">Asal Komisariat:  </label>
            <input type="text" name="komis" id="komis" required>
        </ul>
        <ul>
            <label for="angkatan">Tahun Angkatan:  </label>
            <input type="number" name="angkatan" id="angkatan" required>
        </ul>
        <ul>
            <label for="email">Kontak Email:  </label>
            <input type="text" name="email" id="email">
        </ul>

        <button type="submit" name="submit" id="submit">submit</button>

    </form>    
    
</body>
</html>