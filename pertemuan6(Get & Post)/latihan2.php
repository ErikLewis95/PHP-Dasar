<?php 

//cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"]) || 
    !isset($_GET["nrp"]) || 
    !isset($_GET["email"]) || 
    !isset($_GET["jurusan"]) || 
    !isset($_GET["gambar"])) {
//redirect -> memindahkan user dari suatu halaman ke halamn lain
header("Location: latihan1.php");
exit;
}
?>

<!-- isset fcntion untuk mengecek apakah sebuah variabel udah pernah dibuat atau belum. jika ada user iseng langsung masuk ke latihan2 url maka akan terjadi error ini karena apakan $_GET["nama"] ada datanya sementara user harus masuk ke latihan 1 terlebih dahulu untuk mendapatkan datanya
! not = belum dibuat-->








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
<ul>
    <li><img src="img/<?= $_GET["gambar"]; ?>" width="300px" height="300px" ></li>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["nrp"]; ?></li>
    <li><?= $_GET["email"]; ?></li>
    <li><?= $_GET["jurusan"]; ?></li>
</ul>    

<a href="latihan1.php">Kembali ke daftar mahasiswa</a>
</body>
</html>

<!-- $_GET["nama"] menagkap datanya karena data yang dikirimkan mempunyai key ?nama maka variabel get akan menangkap key tsb kalau di halam latihan1.php ditulis dengan 
?x nama di latihan2.php diketik $_GET["x"]
 
-->