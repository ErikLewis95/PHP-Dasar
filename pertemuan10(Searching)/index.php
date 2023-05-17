<!-- SERCHING -->
 
<?php 
require 'function.php';
//menampilkan seluruh data mahasiswa urutkan berdasarkan ORDER BY DESC-> id yang paling besar merupakan id paling baru ASC dari kecil kebesa DESC dari besar ke kecil; mahasiswa WHERE nrp='123456782' maka akan tampil data sesuai dengan nrp tsb; nah konsep mencari menggunakan query tersebut akan dimanfaatkan untuk membuat fungsi pencarian tapi secara default tampilkan dulu semua data mahasiswa 	
$mahasiswa = query("SELECT * FROM mahasiswa");

//kalau tobol cari ditekan ambil apapun yang diketikan oleh user masukkan ke function cari
if(isset($_POST["cari"])){
    // function cari mendapatkan data dari apapun yang diketikkan oleh usernya
    $mahasiswa =  cari($_POST["keyword"]);
}


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


  <a href="tambah.php">Tambah</a>
  <br><br>
<!-- apakah datanya tampil di url atau tidak kalau idak gunakan $_POST -->
  <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
    <!-- autofocus = atribut html ketika user masuk kehalaman inputnya langsung aktif jadi user tidak perlu klik inputnya kalau mau mencari sesuatu 
 autocomplate = atribut yang digunakan untuk tidak memberikan saran sama html pesan apa aja yang udah diketikkan-->
<button type="submit" name="cari">Cari!</button>
  </form>

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
        <!-- Tombol CRUD -->
        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
        
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('apakah anda yakin?');">hapus</a>
        
      
        <!-- sorot link delet di browser lihat dikiri bawah apakah idnya sudah berubah -->
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
