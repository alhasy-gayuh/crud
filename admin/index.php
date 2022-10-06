<?php
require('../koneksi.php');
$result = query("SELECT * FROM data_alumni");

// tombol cari di klik
if( isset($_POST["cari"]) ){
    $result = cari($_POST["keyword"]); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: 'Arial Narrow';
        }
        body{
            display: block;
            margin: 8% 8%;
        }
        #cari{
            margin-bottom: 10px;
        }
        form a{
            padding: 8px 13px;
            text-decoration: none;
            color: white;
            margin-left: 20px;
            background-color: red;
        }
    </style>
    <title>Data Alumni</title>
</head>
<body>
    <h1>Daftar Nama Alumni PMII Jombang</h1>
    <form action="" method="post">
        <input type="text" name="keyword" size="40px" placeholder="Cari Nama Alumni" autocomplete="off">
        <button type="submit" id="cari" name="cari">Cari</button>
        <a href="../create.php">Tambah Data</a>
    </form>
    <table border="1px" cellspacing="0" cellpadding="8px">
        <thead>
            <th>Aksi</th>
            <th>Nama</th>
            <th>No Telpon</th>
            <th>Asal Komisariat</th>
            <th>Angkatan Ke</th>
        </thead>
        <?php
            foreach($result as $row) :
            ?>
            <tr>
                <td>
                <a href="../hapus.php?no_tlp=<?= $row["no_tlp"] ?>" onclick="return confirm('yakin?');">Hapus</a><br>
                <a href="../edit.php?no_tlp=<?= $row["no_tlp"] ?>">Edit</a>
                </td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["no_tlp"] ?></td>
                <td><?= $row["asal_komis"] ?></td>
                <td><?= $row["angkatan"] ?></td>
            </tr>
            <?php endforeach ?>
    </table>
    
</body>
</html>