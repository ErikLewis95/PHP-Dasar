<?php 
//session_unset ->untuk memastikan session benaran berakhir karena ada beberapa kasus cuman menggunakan session_destroy() sesion belum hilang
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$_SESSION = [];
session_unset();
session_destroy();

//menghapus cookie ubah $id dan $aku1ov3m3l4ny menjadi string kosong
setcookie('id','', time()-3600);
setcookie('aku1ov3m3l4ny','', time()-3600);

header("Location: login.php");

exit;

?>