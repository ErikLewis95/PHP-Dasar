 <!-- READ/ menampilkan data -->
<?php 
require 'function.php';//memanggil file function; require bisa juga menggunakan include
$mahasiswa = query("SELECT * FROM mahasiswa ");
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

 <br>

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
<?php foreach ($mahasiswa as $row) : ?>
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
<?php endforeach; ?>
</table>
 </body>
 </html>
