<?php 
//syntax php

	// STANDAR OUTPUT
	// echo dan print
	// echo "Jum'at";

	// PENULISAN PHP
	// PHP di dalam HTML
	// HTML di dalam PHP

	// VARIABEL
	// diawali dengan tanda $
	// nama variabel tidak boleh diawali dengan angka
	// boleh mengandung angka
	// $nama = "Sandhika Galih";
	// $pesan = "Halo, selamat datang $nama";

	// OPERATOR
	// Aritmatika
	// + - * / %
	// $a = 10;
	// $b = 20;
	// echo $a + $b;

	// CONCATENATION / CONCAT / PENGGABUNG STRING
	// .
	// $nama_depan = "Sandhika";
	// $nama_belakang = "Galih";
	// echo $nama_depan . " " . $nama_belakang;

	// ASSIGNMENT / PENUGASAN
	// =, +=, -=, *=, /=, %=, .=
	// $x = "Sandhika";
	// $x .= " ";
	// $x .= "Galih";
	// echo $x;

	// PERBANDINGAN / COMPARATION
	// ==, <=, >=, <, >, !=

	// IDENTITAS / STRICT COMPARATION
	// ===, !==

	// LOGIKA / LOGICAL
	// &&, ||, !



//Fungsi Echo pada PHP
// echo digunakan HANYA sekedar untuk mencetak output ke browser, tidak ada tujuan lain, sehingga statement inilah yang paling sering digunakan untuk mencetak output ke browser.
$nama = 'Agus';

// Umum digunakan
echo 'Nama: ' . $nama;
echo "<br>";
// Menggunakan koma (jarang digunakan) - performa sedikit lebih cepat
echo 'Nama: ' . $nama;
echo "<br>";
// Ternary - Umum digunakan
echo $nama == 'Agus' ? 'Benar' : 'Salah'; // Hasil Benar

echo "<br>";

//Fungsi Print
/**
Seperti pada echo, print juga digunakan untuk mencetak output ke browse, namun bedanya:

    print ini akan selalu menghasilkan nilai 1.
    print hanya dapat menerima satu argumen, sehingga kita tidak bisa menulis: print: 'Nama ' , $nama

print ini juga bukan merupakan fungsi melainkan hanya “language construct” sehingga ketika menggunakannya, kita tidak perlu menggunakan tanda kurung.
*/
$nama = 'Agus';
print 'Nama: ' . $nama;

// ERROR
print 'Nama: ' . $nama;

// Ternary
print $nama == 'Agus' ? 'Benar' : 'Salah'; // Hasil Benar

// Menghasilkan 1
$nomor = print $nama; // Hasil Agus
print $nomor; // Hasil 1

$list_nama	= array('Alfa', 'Beta', 'Charlie');
$jumlah = 0;
foreach ($list_nama as $nama) {
	$jumlah = $jumlah + print $nama . '<br/>';
}
print $jumlah;
/** Hasil:
Alfa
Beta
Charlie
3



// Fungsi print_r
/** 
Sama seperti statement sebelumnya, print_r ini digunakan untuk mencetak output ke browser, namun bedanya, print_r ini ditujukan untuk mencetak nilai variabel dengan format yang lebih mudah dibaca.

print_r ini benar-benar merupakan fungsi sehingga kita harus menuliskannya menggunakan tanda kurung print_r()
*/
$nama = 'Agus';
print_r ($nama); // Agus

$siswa = array ('Alfa', 'Beta', 'Charlie');
echo '<pre>';  print_r($siswa); echo '</pre>';

/** Hasil
Array
(
    [0] => Alfa
    [1] => Beta
    [2] => Charlie
)
*/

// Menyimpan hasil print_r ke variabel
$siswa = array(
			'nama' 		=> array ('Alfa', 'Beta', 'Charlie'),
			'jurusan' 	=> 'Informatika',
			'semester'	=> array (1, 3)
		);
		 
$result = print_r($siswa, true); 
echo '<pre>'; print_r($result); echo '</pre>';

/** Hasil
Array
(
    [nama] => Array
        (
            [0] => Alfa
            [1] => Beta
            [2] => Charlie
        )

    [jurusan] => Informatika
    [semester] => Array
        (
            [0] => 1
            [1] => 3
        )
) */



// Fungsi var_dump
/** Sama seperti yang lain, fungsi var_dump digunakan untuk mencetak output ke browser, lebih tepatnya mengetahui informasi pada suatu nilai variabel.

var_dump merupakan fungsi, sehingga dalam penulisannya, kita harus menggunakan tanda kurung.
Note: sama seperti print_r, var_dump ini digunakan hanya untuk proses debugging, dimana kita ingin  mengetahui struktur informasi (nilai dan tipe data) dari suatu variabel

Tidak seperti print_r, pada var_dump, kita tidak dapat secara langsung menyimpan output dari var_dump, melaikan harus menggunakan cara lain seperti menggunakan output buffering.

Contoh penggunaan var_dump*/
$nama = 'Agus';
var_dump ($nama); // Hasil: string(4) "Agus"

$siswa = array(
			'nama' 		=> array ('Alfa', 'Beta', 'Charlie'),
			'jurusan' 	=> 'Informatika',
			'semester'	=> 1,
			1 => 'Jakarta',
			2 => 'Surabaya'
		);
		 
echo '<pre>';  var_dump($siswa); echo '</pre>';

/** Hasil
array(5) {
  ["nama"]=>
  array(3) {
    [0]=>
    string(4) "Alfa"
    [1]=>
    string(4) "Beta"
    [2]=>
    string(7) "Charlie"
  }
  ["jurusan"]=>
  string(11) "Informatika"
  ["semester"]=>
  int(1)
  [1]=>
  string(7) "Jakarta"
  [2]=>
  string(8) "Surabaya"
} */

?>