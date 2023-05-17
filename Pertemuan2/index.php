<?php 
//Sintaks PHP

//Standard Output
//echo, print -> mencetak isi variabel /tulisan 
//print_r ->mencetak isi array digunakan saat debugging untuk mencari kesalahan program
//var_dump->untuk melihat isi variabel digunakan saat debugging untuk mencari kesalahan program
 //echo "jum'at";kutip 2 lebih sakti dari pada kutip 1 karena dengan kutip 2 kita bisa menggunakan sebuah konsep yang dinamakan interpolasi -> untuk mengecek apakah didalam kutip2/sting terdapat variabel atau tidak jika ada varibelnya maka yang ditampilakan isi variabelnya

 //Penulisan sintaks PHP
//1. PHP di dalam HTML
//2. HTML didalam PHP 
//variabel dan tipe data
//Variabel -> "$" syarat penulisan : 1. aturannya namanya tidak boleh diawali dengan angka tapi boleh menggunakan angka; 2. tidak boleh menggunakan spasi kalau menggunakan 2 suku kata maka gunakan _ dan juga tidak boleh menggunakan - 
//contoh :
// $nama = "Erik Simaremare";
// echo "Hallo, nama saya $nama"; //interpolasi maka mencetak isi variabel jika menggunakan kutip 2 jika menggunakan kutip 1 maka interpolasinya tidak jalan 

//Operator
//Aritmatika
//+-*/%
// $x = 10;
// $y =20;
//echo $x * $y;
// penggabung string /concetination/concat
// . 
// $nama_depan="Erik";
// $nama_belakang ="Simaremare";
// echo $nama_depan . " " . $nama_belakang;// Erik Simaremare

//Assignment (opearator penugasan)
// =, +=, -=, *=, /=, %=, .= //operator = akan mencetak variabel yang berikutnya jika menggunakan 2 varibel yang sama
// $x =1; 
// $x +=5;
// echo  $x; //hasil 6
$nama = "Erik";
// $nama .= " ";
// $nama . ="Lewis";
// echo $nama; 


//Perbandingan 
//< , >, <=, >=, ==
// var_dump(1 < 5);//bolean true or false hasilnaya true;
// var_dump(1 ==  5);//apakah 1 sama dengan 5 -> false
// var_dump(1 ==  "1");//apakah 1 sama dengan string 1 -> true ; ini digunakan untuk mengecek nilanya 

//Identitas
// ===, !==
// var_dump (1 === "1")// apakah tipe data 1 sma dengan tipe data sting 1 maka hasilnya false 

//logika
//&& ,||, !
// $x = 30;
// var_dump($x < 20 && $x % 2 == 0);//apakah 30 lebih kecil dari 20 atau 30 adalaah bilangan genap mka hasilnya false tapi kalau menggunakan operator || maka cukup 1 aja yang bernilai true maka hasilnya true



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <!-- 1  PHP di dalam HTML-->
    <h1>Halo, Selamat Datang <?= $nama ?> </h1>
    <p><?php echo "ini adalah paragrah"; ?></p>
    <!-- 2 HTML didalam PHP -->
    <?php
    echo"<h1>Halo, Selamat Datang Lewis </h1>"
    ?>
</body>
</html>

