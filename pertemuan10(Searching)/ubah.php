<!-- Create / Insert data -->

<?php 
require 'function.php';
//koneksi ke DBMS
// $db= mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data di URL
$id=$_GET["id"];
var_dump($id);

//query data mahasiswa berdasarkan idnya ; isinya merupakan data yang bersangkutan ambil function query
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];//panggil function query begitu dimasukkan ke dalam array rowsnya langsung ambil index ke 0 nya atau element 1 ; id tidak perlu diberi kutip '' karena dia integer
// var_dump($mhs[0]["nama"]); //assosiative ARRAY //kalau menampilkan ($mhs["nrp"]) akan terjadi error walaupun jelas" ada data ($mhs) menunjukkan key nrp karena coba liat klick kanan view page source liat array dari function query
// array(1) { [0]=> array(6) { ["id"]=> string(2) "14" ["nama"]=> string(9) "123456782" ["nrp"]=> string(9) "Dody Ferd" ["email"]=> string(14) "dody@gmail.com" ["jurusan"]=> string(12) "Teknik Mesin" ["gambar"]=> string(8) "dody.jpg" } }
//olehsebah itu harus dibuka dulu bungkus luarnya index[0]

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
   
    // cek apakah data berhasil di tambahkan atau tidak
    if(ubah($_POST) > 0){
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value= "<?= $mhs["id"]; ?>" />
    <ul>
<!-- <li>
    <label for="id">id : </label>
    <input type="text" name="id" id="id" required value="<?= $mhs["id"]; ?>">
</li> -->
<li>
    <label for="nrp">NRP : </label>
    <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
</li>
<li>
    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
</li>
<li>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
</li>
<li>
    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
</li>
<li>
    <label for="gambar">Gambar</label>
    <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
</li>
<li>
    <button type="submit" name="submit">Ubah</button>
</li>
</ul>
</form>
</body>
</html>

    <!-- action dikosongkan ketika submit jalan maka datanya akan dikirim kehalaman ini; methode post digunakan agar saat megirimkan data ke database tidak memuat keynya di url sehingga tidak kepanjangan -->
<!-- untuk mengisi data didalam element formnya bisa menggunakan atrribut html value; jadi ketika user mengkli tmbl ubah nilai di dalam formnya merupakan isi dari atribut value itu sendiri-->
<!-- buat nilai value nrp sesuai dengan data di DB (value dinamis) -->
<!-- required ->user harus mengisi inputannya -->
<!-- key hubungannya sama name jika nama berubah maka harus didefinisikan pada isset -->
<!-- memasukkan value jurusan ke inputan -->
<!-- $id dalam function.php tidak ada di dalam inputan ubah.php namun user tidak perlu mengubah data id karena itu primary key yang tidak boleh duplicate apabila user mengubah data id akan terjadi erro karena user tidak mengetahui id yang belum digunakan dari table tsbt maka solusinya adalah agar $id tetap dikirim ke function.php tapi user tidak perlu mengetahui bahkan mengubahnya maka solusinya ada inputan tipenya hiden -->