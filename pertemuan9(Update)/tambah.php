<!-- Create / Insert data -->

<?php 
require 'function.php';
//koneksi ke DBMS
// $db= mysqli_connect("localhost", "root", "", "phpdasar");

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // var_dump($_POST); //datanya akan dikirim ke halam ini sendiri
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
    if(tambah($_POST) > 0){
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
    <!-- action dikosongkan ketika submit jalan maka datanya akan dikirim kehalaman ini; methode post digunakan agar saat megirimkan data ke database tidak memuat keynya di url sehingga tidak kepanjangan -->
    <ul>
<li>
<label for="nrp">NRP : </label>
<input type="text" name="nrp" id="nrp" required>
<!-- required ->user harus mengisi inputannya -->
</li>
<li>
<label for="nama">Nama : </label>
<input type="text" name="nama" id="nama" required>
</li>
<li>
<label for="email">Email</label>
<input type="text" name="email" id="email" required>
</li>
<li>
<label for="jurusan">Jurusan</label>
<input type="text" name="jurusan" id="jurusan" required>
</li>
<li>
    <label for="gambar">Gambar</label>
    <input type="text" name="gambar" id="gambar" required>
</li>
<li>
    <button type="submit" name="submit">Tambah</button>
<!-- key hubungannya sama name jika nama berubah maka harus didefinisikan pada isset -->
</li>
</ul>
</form>
</body>
</html>