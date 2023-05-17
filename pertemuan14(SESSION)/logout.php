<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");

exit;
//sessio_unset ->untuk memastikan session benaran berakhir karena ada beberapa kasus cuman menggunakan session_destroy() sesion belum hilang
?>