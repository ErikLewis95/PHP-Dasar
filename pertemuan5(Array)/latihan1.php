<?php 
//array
//variabel yang dapat memiliki banyak nilai
 //elemen pada array boleh memiliki tipe data yang berbeda 
//pasangan antara key dan value
//key-nya adalah index, yang dimulai dari 0
 // $hari1 = "Senin";
// $hari2 ="Selasa";

//membauat array
//cara lama
$hari = array("Senin", "Selasa", "Rabu");
//cara baru
$bulan=["Januari", "Februari", "Maret"];
//berbeda tipe data
$arr1=[123, "tulisan", false];

echo "<h1>Menampilkan Array</h1>";

echo "<b>Versi Debugging untuk Developer atau Bukan untuk User
var_dump() / print_r()</b>";


echo "<h5>1. var_dump()</h5>";
var_dump($hari);
echo "<h5>2. print_r()</h5>";
print_r($bulan);
 echo "<br>";

 echo "<br>";
 echo "<b>Menampilkan 1 elemen pada array</b>";
 echo "<br>";
 echo $arr1[0];
 echo "<br>";
 echo $bulan[1];
 echo "<br>";
 
 echo "<br>";
 echo "<b>Menambahkan elemen baru pada array</b>";
 echo "<br>";
 var_dump($hari);
 $hari[]= "Kamis";
 $hari[]= "Jum'at";
 echo "<br>";
 var_dump($hari);
 ?>