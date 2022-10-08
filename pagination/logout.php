<?php

// meghapus session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

//menghapus cookie
setcookie("id", "", time() - 3600);  // hapus salah satu saja sudah cukup
setcookie("key", "", time() - 3600);

header("Location: login.php");