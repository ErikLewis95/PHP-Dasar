<?php 
session_start();

echo $_SESSION["nama"];


?>

<!-- 
problem1. ketika echo dijalankan akan terjadi error karena halaman2 tidak mengetahui apa itu $nama, sedangkan $nama didefenisikan di halaman1 
problem2. sebelum pindah kehalaman2 terlebih dahulu kehalaman1 agar mencetak datanya, sehingga ketika keluar dari browser langsung masuk ke url halaman2 maka data dalam variable tersebut tidak bisa terbaca karena hanya mencetak 1 kali sesi atau session.
problem3. kita juga bisa menghilangkan sessionnya tanpa menutup browsernya caranya menggunakan session_destroy(); dihalaman3
-->
