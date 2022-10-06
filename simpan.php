<?php

require('koneksi.php');

//Menyimpan kedalam database
$nama = $_POST["nama"];
$tlpn = $_POST["tlpn"];
$komis = $_POST["komis"];
$angkatan = $_POST["angkatan"];
$email = $_POST["email"];

//query sql untuk memasukkan atau insert data ke dalam database

$result = mysqli_query($conn,"INSERT INTO data_alumni
            VALUES('$nama','$tlpn','$komis','$angkatan','$email')");


// if ($conn->query($result) === TRUE) {
//     echo "Data Berhasil di Tambahkan";
//   } else {
//     echo "Error: " . $result . "<br>" . $conn->error;
//   }
  
//   $conn->close();

if($result == true){
  echo("Berhasil Tambah Data");
}else{
  echo("gagal di tambah");
}
  ?>
<br><br><br>
<a href="create.php">Kembali</a>
<a href="admin/index.php">Masuk ke Dashboard</a>