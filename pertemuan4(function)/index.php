<!-- function potongan script atau baris kode yang digunakan untuk mempermudah kita pada saat program, function tsb bisa di kasi nama dan di panggil berulang"
1. Built-in Function
2. User-Defined Function

# Fungsi Date/Time
1. Time()
2. date()
3.mktime()
4.strtotime()
-->

<?php 
//Date
//Untuk menampilkan tanggal dengan format tertentu
http://www.php.net/manual/en/function.date.php
 
//  echo date("l, d-M-Y");

 //Time
 //UNIX Timestamp / EPOCH time
 //detik yang sudah berlalu sejak 1 Januari 1970
//  echo time();
// echo date("l,  d-M-Y", time()-60*60*24*100);

//mktime
//membuat sendiri detik
//mktime(0,0,0,0,0,0)
//jam, menit, detik, bulan, tanggal, tahun
//echo date ("l",mktime(0,0,0,3,26,1995)); //hari kelahiran Erik untuk mencari hari apa pada saat tanggal tsbt

//strtotime
//echo date ("l",strtotime("26 Mar 1995"));

//String
//1. strlen()
//2. strcmp()
//3. explode()
//4. htmlspecialchars()

//Utility
// var_dump()
// isset()
// empty()
// die()
// sleep()

//User-defined Function
function salam($waktu = "Datang",$name = "Admin"){
    return "Selamat $waktu, $name!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= salam("Pagi","Erik Lewis"); ?></h1>
</body>
</html>