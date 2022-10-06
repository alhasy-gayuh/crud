<?php
$servername = "localhost";
$username = "gayuh";
$password = "root";
$database = "db_alumni";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
$query = mysqli_query($conn, "SELECT * FROM data_alumni");

function tambah($data)
{
    global $conn; //mengambil variable $conn dari scope global

    $nama = htmlspecialchars($data["nama"]);
    $tlpn = htmlspecialchars($data["tlpn"]);
    $komis = htmlspecialchars($data["komis"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $email = htmlspecialchars($data["email"]);

    // htmlspecialchars() berfungsi agar tidak mengizinkan orang menyusupkan script html ke dalam inputan data

    //query sql untuk memasukkan atau insert data ke dalam database
    $query = "INSERT INTO data_alumni VALUES('$nama','$tlpn','$komis','$angkatan','$email')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function hapus($no_tlp)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM data_alumni WHERE no_tlp = $no_tlp");

    return mysqli_affected_rows($conn);
}

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function edit($data)
{
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

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{

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

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek user sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Username sudah terdaftar')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!')
        </script>";

        return false;
    }

    // enkripsi passwordnya
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert ke database
    mysqli_query($conn, "INSERT INTO user (username,password) VALUES('$username','$password')");

    return mysqli_affected_rows($conn);
}
