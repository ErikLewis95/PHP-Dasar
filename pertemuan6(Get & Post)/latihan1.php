<?php
//Variabel Scope / lingkup variabel
// $x=10;//variabel local untul latijan1.php
// // echo $x;  -->mencetak variabel yang terdapat di dalam file php ini  
// echo "<br>";

// function tampilX() {
//     global $x;//keyword untuk menampilkan variabel yang terdapat diluar function 
//     // $x=20;//variabel yang tedapat didalam lingkup function
//     echo $x;//lingkup variabel yang ada didalam function berbeda dengan yang ada diluar function oleh karena itu maka harus mendifine variabel tsb dengan menggunakan global meskipun nama variabel tsbt sama;
// }

//  tampilX();

?>

<!-- 
    Variabel Superglobals(semuanya merupakan tipe array assosiative) yang dimiliki oleh PHP :
    1. $_GET
    2. $_POST
    3. $_REQUEST
    4. $_SESSION
    5. $_COOKIE
    6. $_SERVER
    7. $_ENV
methode request $GET sama variabel $_GET berbeda
 -->


 <?php 
//array associative tdk boleh dicetak menggunakan variabel hny menggunakan echo harus mnggunakan var_dump/print_r
//  var_dump($_GET);
//  var_dump($_POST);
//  var_dump($_SERVER);
// echo $_SERVER["SERVER_NAME"];
//$_GET
// $_GET["nama"]="Erik Lewis";//key "nama" value "Erik Lewis"
// $_GET["nrp"]="096678909";
// var_dump($_GET);
//khusus untuk variabel GET mengisi datanya dapat diisi didalam URL websitenya caranya dengan masuk ke url lalu tambahkan ?key=value, maka data yang digirimkan akan ditangkap global variable $_GET akan ditampilkan nilainya, kalau ada muncul %20 itu artinya cara url mengartikan tanda spasi,


$mahasiswa = 
[
    [
 "Nama"    => "Steve Jobs", 
 "NRP"     => "043040023", 
 "Jurusan" => "Teknik Informatika", 
 "Email"   => "stevejobs@gmail.com",
 "gambar"  => "steve.jpg"
    ],
      [
 "Nama"    => "Elon Musk", 
 "NRP"     => "099789986", 
 "Jurusan" => "Teknik Mesin", 
 "Email"   => "elonmusk@gmail.com",
 "gambar"  => "elon.jpg",
 "Tugas"   => [80,90,100]
    ],
];

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
      .gambar{
        width :300px;
        height :300px;
      }
      </style>

  </head>
  <body>
    <ul>
    <?php foreach($mahasiswa as $mhs) : ?>
        <li>
          <a href="latihan2.php?nama=<?= $mhs["Nama"];?>&nrp=<?= $mhs["NRP"];?>&jurusan=<?= $mhs["Jurusan"];?>&email=<?=$mhs["Email"];?>&gambar=<?=$mhs["gambar"];?>"><?= $mhs["Nama"]; ?></a>
        </li>
      <?php endforeach; ?>
      </ul>
  </body>
  </html>

  <!-- contoh punya link berupa nama kemudian ketika di klick maka akan muncul ke halaman yang di tuju latihan2.php tepapi ketika sekumpulan nama tersebut di klik masing" maka akan  menampilkan data yang sama di halaman yang sama maka dari itu jika ingin menampilan data yang berbeda namun di file yang sama dapat menggunakan variable superglobal $_GET ; caranya :
1. gunakan array assosiative kemudian lakukan looping ketika nama tersebut di sorot dengan kursor maka lihat dikiri bawah web browser maka namanya akan berubah" sesuai dengan array tsb kalau datanya sudah dikirimkan maka yang dilakukan menangkap datanya.
2. menggunakan superglobal $_GET dihalaman yang di tuju dalam hal ini $_GET
masalah : ketika menggirimkan data yang panjang nanti di url kepenuhan dan url ada batasan sting/karakter didalamnya paling yang dikirim identifiernya/idnya methode request get adalah methode pengiriman data melalui url dan data tersebut bisa diambil dan bisa ditangkap oleh variabel supergloba_get-->