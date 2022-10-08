<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require('../koneksi.php');

// pagination
// configurasi
$datatampil = 2;

// MENGHITUNG JUMLAH TOTAL DATA YANG DI MILIKI
// $alumni = mysqli_query($conn,"SELECT * FROM data_alumni");
// $totaldata = mysqli_num_rows($alumni); // total jumlah semua baris data
// ATAU BISA JUGA DENGAN CARA DI BAWAH

$banyakdata = count(query("SELECT * FROM data_alumni"));
// COUNT dapat menghitung jumlah banyaknya data di dalam array

// JUMLAH HALAMAN??
$jumlahhalaman = ceil($banyakdata / $datatampil);

(isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;

// LOGIKA MENAMPILKAN DATA PERHALAMAN
$awaldata = ($datatampil * $halamanaktif) - $datatampil;

$result = query("SELECT * FROM data_alumni LIMIT $awaldata,$datatampil");

// tombol cari di klik
if (isset($_POST["cari"])) {
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
        * {
            font-family: 'Arial Narrow';
        }

        body {
            display: block;
            margin: 8% 8%;
        }

        #cari {
            margin-bottom: 10px;
        }

        form a {
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
    <a href="logout.php">Logout</a>
    <h1>Daftar Nama Alumni PMII Jombang</h1>
    <form action="" method="post">
        <input type="text" name="keyword" size="40px" placeholder="Cari Nama Alumni" autocomplete="off">
        <button type="submit" id="cari" name="cari">Cari</button>
        <a href="../create.php">Tambah Data</a>
    </form>

    <?php if($halamanaktif > 1): ?>
    <a href="?halaman=<?= $halamanaktif-1; ?>">&laquo;</a>
    <?php endif ?>
    <!-- NAV PAGINATION -->
    <?php for($i=1;  $i<$jumlahhalaman; $i++) :?>
        <?php if($i == $halamanaktif) :?>
                <a href="?halaman=<?=$i ?>" style="font-weight: bold; color:orange;" ><?= $i ?></a>
            <?php else : ?>
                <a href="?halaman=<?=$i ?>"><?= $i ?></a>
        <?php endif ?>
    <?php endfor ?>

    <?php if($halamanaktif < $jumlahhalaman): ?>
    <a href="?halaman=<?= $halamanaktif+1; ?>">&raquo;</a>
    <?php endif ?>

    <table border="1px" cellspacing="0" cellpadding="8px">
        <thead>
            <th>Aksi</th>
            <th>Nama</th>
            <th>No Telpon</th>
            <th>Asal Komisariat</th>
            <th>Angkatan Ke</th>
        </thead>
        <?php
        foreach ($result as $row) :
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