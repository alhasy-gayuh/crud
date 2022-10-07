<?php
    require '../koneksi.php';

    if( isset ($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    
    // cek username
    if(mysqli_num_rows($result) === 1){ // mysqli_num_rows >> mengembalikan nilai 1 dan 0
        
        // cek password
        $row = mysqli_fetch_assoc($result);

        /// password_verify >> mengecek password_hash
        if( password_verify($password, $row["password"]) ){
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP | LOGIN</title>
    <style>
        ul li{
            display: table;
        }
        label{
            display: block;
        }
        #login{
            margin-top: 10px;
            color: white;
            background-color: blueviolet;
            padding: 8px 13px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    
    <?php if(isset($error)) : ?>
        <p style="color: red; font-style:italic;">Username / password Salah!</p>
    <?php endif ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username">
            </li>
                <label for="password">Password : </label>
                <input type="password" name="password">
            </li>
            <li>
                <button type="submit" name="login" id="login">Login</button>
            </li> 
        </ul>
    </form>
    
</body>
</html>