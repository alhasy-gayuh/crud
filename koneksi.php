<?php
$servername = "localhost";
$username = "gayuh";
$password = "root";
$database = "db_alumni";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
$query = mysqli_query($conn, "SELECT * FROM data_alumni");

function tambah($data){
    global $conn; //mengambil variable $conn dari scope global

    $nama = htmlspecialchars($data["nama"]);
    $tlpn = htmlspecialchars($data["tlpn"]);
    $komis = htmlspecialchars($data["komis"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $email = htmlspecialchars($data["email"]);

// htmlspecialchars() berfungsi agar tidak mengizinkan orang menyusupkan script html ke dalam inputan data

//query sql untuk memasukkan atau insert data ke dalam database
$query = "INSERT INTO data_alumni VALUES('$nama','$tlpn','$komis','$angkatan','$email')";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}



function hapus($no_tlp){
    global $conn;
        
    mysqli_query($conn, "DELETE FROM data_alumni WHERE no_tlp = $no_tlp");

    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}

function edit($data){
    global $conn; //mengambil variable $conn dari scope global

    $nama = htmlspecialchars($data["nama"]);
    $tlpn = htmlspecialchars($data["tlpn"]);
    $komis = htmlspecialchars($data["komis"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $email = htmlspecialchars($data["email"]);
// htmlspecialchars() berfungsi agar tidak mengizinkan orang menyusupkan script html ke dalam inputan data

//query sql untuk memasukkan atau insert data ke dalam database
$query = "UPDATE data_alumni SET
                nama = '$nama',
                no_tlp = '$tlpn',
                asal_komis = '$komis',
                angkatan = '$angkatan',
                email = '$email'
                    WHERE 
                no_tlp = $tlpn
            ";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

function cari($keyword){

    $query = "SELECT * FROM data_alumni 
                WHERE
            nama LIKE '%$keyword%' OR
            no_tlp LIKE '%$keyword%' OR
            asal_komis LIKE '%$keyword%' OR
            angkatan LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
    ";
    return query($query);
}