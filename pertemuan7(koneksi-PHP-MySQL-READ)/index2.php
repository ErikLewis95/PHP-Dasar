<!-- menghubungksn php dengan mysql menggunakan driver/ekstensi -->
<!-- ekstensi mySQL versi lama tdk diupdate dan banyak celah keamanan-->
<!-- ekstensi MySQLi(improve) sudah diperbaiki lebih teroptimasi dan lebih aman -->
<!-- ekstensi PDO(PHP DATA Object) driver untuk terhubung kedalam database sama seperti mysqli tapi bedanya dengan pdo kita bisa tehubung kebanyak database suatu saat kita terhungun ke databse tadinya ke mysqli berubah ke postgres tdk banyak code yang diubah tapi ketika menggunakan mysqli ketika databasenya diubah maka codenya harus diubah semua
-->

 <!-- koneksi dan melihat data (Read/menampilkan data) -->
<?php 
//koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");
// nama host, username, password, nama database

//ambil data dari table mahasiswa /query data mahasiswa
$result = mysqli_query($db, "SELECT * FROM mahasiswa");
//parameter 1 variable, query kalau querynya tdk berubah warna ungu artinya ada salah penuslisan querynya dan kalau nama table salah maka fungsi returnya  true or false
// var_dump($result);
//untuk menampilkan error koneksi
// if (!$result){
//     echo mysqli_error($db);
// };
//ambil data (fetch) mhasiswa dari object result
//mysqli_fetch_row()     -> mengembalikan array numerik
//mysqli_fetch_assoc()   -> mengembalikan array associative
//mysqli_fetch_array()   -> mengembalikan numerik assoc
//mysqli_fetch_object()
// $box= mysqli_fetch_row($result);
// var_dump($box[3]);//menampilkan value data index 3;
// $box= mysqli_fetch_array($result);
// var_dump($box);//menampilkan value data dengan menggunakan key
// noted : pakai fetch row atau assoc saran jika mengetahui key /nama field tablenya gunakan assoc jika tidak gunakan index field table tersebut 

//menampilkan semua data
// while ($box= mysqli_fetch_assoc($result)){
// var_dump($box);
// }
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .gambar{
            witdh: 200px;
            height:200px;
        }
    </style>
 </head>
 <body>
    
 <h1>Daftar Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">

<tr>
<th>No.</th>
<th>Aksi</th>
<th>Gambar</th>
<th>NRP</th>
<th>Nama</th>
<th>Email</th>
<th>Jurusan</th>
</tr>
<?php $i=1; ?>
<!-- $i nomor table tidak menggunakan id dari database karena jika salah satu field datanya dihapus maka no urut tablenya tidak sesuai -->
<?php while ($row =mysqli_fetch_assoc($result)) : ?>
<tr>
    <!-- <td><?= $row["id"]; ?></td> -->
    <td><?= $i; ?> </td>
    <!-- memberi no table -->
    <td>
        <a href="">ubah</a> |
        <a href="">hapus</a>
    </td>
    <td><img class="gambar" src="img/<?= $row["gambar"]; ?> "  alt=""></td>
    <td><?= $row["nrp"];?></td>
    <td><?= $row["nama"];?></td>
    <td><?= $row["email"];?></td>
    <td><?= $row["jurusan"];?></td>
</tr>
<?php $i++ ?>
<!-- no nya =+1 jika ada data bertambah maupun data dihapus sehingga  nomornya jadi berurut  -->
<?php endwhile; ?>
</table>
 </body>
 </html>
