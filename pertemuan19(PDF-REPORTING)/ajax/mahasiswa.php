<link rel="stylesheet" href="css/style.css">
<?php 
// sleep(1); //->function sleep gunanya untuk menidurkan halaman ini selama 1 detik guna untuk melihat icon loader.gif berjalan seolah" internet lambat tapi kalau disistem di internet jangan gunakan

//microsecond

// usleep(500000); //tidur selama 1/2 detik

require '../function.php';

//keyword ditangkap dari ajax di script.js 
$keyword = $_GET["keyword"];

$query =  "SELECT * FROM mahasiswa WHERE
            nama LIKE '%$keyword%'OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
";
$mahasiswa = query($query);
?>
<!-- mekanisme setiap kali kita mengetikkan sesuatu dikolom pemncarian data input di index pencariannya akan dikirimkan ke mahasiswa.php menggunakan ajax, nanti mahasiswa.php akan mengambil apapun yang diketikkan kemudian mencari mahasiswa berdasarkan keywordnya dan ini dilakukan setip kali memencet tombol di laptop-->


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
<!-- $i nomor table tidak menggunakan id dari database karena jika salah satu field datanya dihapus maka no urut tablenya tidak berurut -->
<?php foreach ($mahasiswa as $row) : ?>
<tr >
    <!-- <td><?= $row["id"]; ?></td> -->
    <td><?= $i; ?> </td>
    <!-- memberi no table -->
    <td>
        <!-- Tombol CRUD -->
        <a href="ubah.php?id=<?= $row["id"]; ?>"><input type="button" class="btn-update"></a> |
        
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin?');"><input type="button" class="btn-delete"></a>
        
      
        <!-- sorot link delet di browser lihat dikiri bawah apakah idnya sudah berubah -->
    </td>
    <td><img class="gambar" src="img/<?= $row["gambar"]; ?> "  alt=""></td>
    <td><h3><?= $row["nrp"];?></h3></td>
    <td><h3><?= $row["nama"];?></h3></td>
    <td><h3><?= $row["email"];?></h3></td>
    <td><h3><?= $row["jurusan"];?></h3></td>
</tr>
<?php $i++ ?>
<!-- no nya =+1 jika ada data bertambah maupun data dihapus sehingga  nomornya jadi berurut  -->
<?php endforeach; ?>
</table>