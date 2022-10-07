<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: admin/login.php");
    exit;
}

require 'koneksi.php';

// ambil data no_tlp dari index
$no_tlp = $_GET["no_tlp"];

// query data berdasarkan no_tlp
$alumni = query("SELECT * FROM data_alumni WHERE no_tlp = $no_tlp")[0];

//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ){
    if(edit($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil di Edit');
                document.location.href = 'admin/index.php'
            </script>
        ";

    }else{
        echo "
        <script>
            alert('Data Gagal di Edit');
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
    <h1>Edit Nama Alumni PMII Jombang</h1>
    <form action="" method="post">
        <ul>
            <label for="nama">Masukkan Nama: </label>
            <input type="text" name="nama" id="nama" required value="<?= $alumni["nama"] ?>">
        </ul>
        <ul>
            <label for="tlpn">No Telepon: </label>
            <input type="number" name="tlpn" id="tlpn" value="<?= $alumni["no_tlp"] ?>">
        </ul>
        <ul>
            <label for="komis">Asal Komisariat:  </label>
            <input type="text" name="komis" id="komis" required value="<?= $alumni["asal_komis"] ?>">
        </ul>
        <ul>
            <label for="angkatan">Tahun Angkatan:  </label>
            <input type="number" name="angkatan" id="angkatan" required value="<?= $alumni["angkatan"] ?>">
        </ul>
        <ul>
            <label for="email">Kontak Email:  </label>
            <input type="text" name="email" id="email" value="<?= $alumni["email"] ?>">
        </ul>

        <button type="submit" name="submit" id="submit">Edit</button>

    </form>    
    
</body>
</html>