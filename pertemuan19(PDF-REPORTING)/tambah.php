<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//jika tidak ada sesion login maka kembali ke login
if ( !isset($_SESSION['login'])){
header("Location: login.php");
exit;
} 

require 'function.php';
//koneksi ke DBMS
// $db= mysqli_connect("localhost", "root", "", "phpdasar");


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    //  var_dump($_POST);//datanya akan dikirim ke halam ini sendiri
    //  var_dump($_FILES); die;//lihat view page souce didalam ada $_FILES untuk mengelola upload/file menagement hasilnya akan seperti beriku
//       array(5) {
//   ["nrp"]=>
//   string(9) "777111222"
//   ["nama"]=>
//   string(13) "Yesus Kristus"
//   ["email"]=>
//   string(22) "yesuskristus@gmail.com"
//   ["jurusan"]=>
//   string(5) "AGAMA"
//   ["submit"]=>
//   string(0) ""
// }
// array(1) {
//   ["gambar"]=>
//   array(5) {
//     ["name"]=>
//     string(10) "yesus.jpeg"->nama file yang di upload
//     ["type"]=>
//     string(10) "image/jpeg"->tipe/ekstensi
//     ["tmp_name"]=>
//     string(24) "C:\xampp\tmp\phpCF1D.tmp"->tempat penyimpanan sementara move-upload-file ketempat yang kita inginkan
//     ["error"]=>
//     int(0)         -> jika tidak ada error maka nilainya 0 jika selain 0 ada error
//     ["size"]=>
//     int(5753)  ->ukuran file bisa dlm byte jika gambar yg d upload punya batas ukuran
//   }
// }

     
 // ambil data dari tiap elemen dalam form
    // $nrp = $_POST["nrp"];
    // $nama = $_POST["nama"];
    // $email = $_POST["email"];
    // $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    // query insert data
    // $query = "INSERT INTO mahasiswa
    //         VALUES
    //         ('','$nrp','$nama', '$email', '$jurusan', '$gambar')";
    //          '' merupakan id; harus tetap disediakan valuesnya walaupun kosong tidak dibuat diatas dbiarkan mysql yang akan mengisinya
    //         $nrp $nama dll dibuatkan variable karna ada kutip " diawal sehingga ketika dibuat query $_POST["nrp"] akam terjadi error karna " dalam key akan dibaca sebagai penutup kutip querynya begitu juga menggunakan kutip' biar tidak repot dibuatka variabelnya 
    // mysqli_query($conn, $query);
    // var_dump(mysqli_affected_rows($conn));
    // note : (mysqli_effected_rows($conn)); -> ketika manipulasi data(CRUD) dalam mysql biasnya ada fungsi yang memberitahu kita ada berapa baris table yang berubah/terpengaruhi di dalam mysqlnya biasanya ada pesan Query OK berapa row Affected; jika gagal maka nilainya-1 atau  kalau berhasil datanya terkirim nilainya 1
    // cek apakah data berhasil di tambahkan atau tidak
    // if (mysqli_affected_rows($conn)>0){
    //     echo "berhasil";
    // }else{
    //     echo "gagal";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }
    if( tambah($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }
}
//fungsi tambah akan menghasilkan nilai false; apakah false>0 jalankan pesan data gagal
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<center>
<body>
  
    <form action="" method="post" enctype="multipart/form-data">
    <!-- action dikosongkan ketika submit jalan maka datanya akan dikirim kehalaman ini; methode post digunakan agar saat megirimkan data ke database tidak memuat keynya di url sehingga tidak kepanjangan -->
  
     <table>
        <th colspan="2"  class="kepala">
        <h1 class="title">Tambah Data Mahasiswa</h1>
</th>
        <tr>
            <th><label for="nrp">NRP</label></th>
            <td><input type="text" name="nrp" id="nrp" required class="input"></td>
        </tr>
        <tr>
            <th><label for="nama">Nama</label></th>
            <td><input type="text" name="nama" id="nama" required class="input"></td>
        </tr>
        <tr>
            <th><label for="email">Email</label></th>
            <td><input type="text" name="email" id="email" required class="input"></td>
        </tr>
        <tr>
            <th><label for="jurusan">Jurusan</label></th>
            <td><input type="text" name="jurusan" id="jurusan" required class="input"></td>
        </tr>
        <tr>
            <th><label for="gambar">Gambar</label></th>
            <td><input type="file" name="gambar" id="gambar" ></td>
        </tr>
<td colspan="2" style="text-align: center;" class="kaki">
<nav class="container">
        <button type="submit" name="submit" class="btn-hover color-8">TAMBAH</button> | <a href="index.php" class="btn-hover color-9">KEMBALI</a>
</nav>
    </td>
    </table>
<!-- required ->user harus mengisi inputannya -->    
<!-- key hubungannya sama name jika nama berubah maka harus didefinisikan pada isset -->
       
</form>

</body>
</center>
</html>


<!-- Create / Insert data -->

<!-- UPLOAD (FILE HANDLING)
1. <input type='file' >
2. atribut form enctype(encoding type) tipe encoding apa yang seperti apa yang digunakan untuk menangani sebuah file, sebelumnya membahas type="text"
3.  variable superglobal $_FILES khusus dibuat untuk menangani data file
4. move_uploaded_file 
noted: sebenernya data gambar dll bisa dimasukkan ke dalam database langsung karna didalam mysql ada type data yang namanya blob(binary large object) tidak disarkan untuk menyimpan file langsung ke database dikarenaka ukuran database akan menjadi sangat besar dan menjadi berat karena ukuran yng besar, karena kita bekerja dengan file, file tempatnya di dalam didalam directory, sementara nama filenya akan disimpan kedalam database sebagai string 
-->