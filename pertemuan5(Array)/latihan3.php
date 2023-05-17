<?php
//array biasa
$mahasiswa =["Albert Yoshi", "0698007324", "Sastra Inggris", "albertyoshi@gmail.com"];

//Array Multidimensi atau Array di dalama array digunakan ketika menampilkan data yang banyak tanpa harus mendeklarasikan banyak array biasa; Array ini juga disebut array numerik yakni array yang indexnya angka yang dimulai dari 0 sehingga nama dan data yang diisikan harus berdasarkan urutan yang tepat sehingga tidak salah dalam menampilkan poisi datanya
$mahasiswa2 = [ 
["Erik Lewis", "043040023", "Teknik Informatika", "eriksimaremare@gmail.com"],
["Ifandi Gilbert", "099789986", "Teknik Mesin", "ifandigilbert@gmail.com"],
["Sandhika Galih", "086812689", "Teknik Sipil", "sandhikagalih@gmail.com"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
   <h1>Daftar Mahasiswa</h1> 

   <ul>
     <b>Cara Biasa Tanpa Looping</b>
     <li>Satrio Suryo</li>
     <li>0987545452</li>
     <li>Metalurgi</li>
     <li>Satriosuryo@gmail.com</li>
   </ul>


   <h1> Looping Cara 1 </h1>
   <ul>
      <?php foreach ( $mahasiswa as $mhs) :?>
      <li><?php echo $mhs ?></li>
      <?php endforeach;?>
  </ul>

  <h1>Looping Cara 2</h1>
  <ul>
  <li><?php echo $mahasiswa[0]?></li>
  <li><?php echo $mahasiswa[1]?></li>
  <li><?php echo $mahasiswa[2]?></li>
  <li><?php echo $mahasiswa[3]?></li>
  </ul>
<ul>

 
<h1>Looping Cara 3</h1>
<?php foreach ( $mahasiswa2 as $mhs ) : ?>
 <ul>
    <li>Nama    :   <?= $mhs[0]; ?></li>
    <li>NRP     :   <?= $mhs[1]; ?></li>
    <li>JURUSAN :   <?= $mhs[2]; ?></li>
    <li>Email   :   <?= $mhs[3]; ?></li></br>
  </ul>
  <?php endforeach; ?>
</body>
</html>