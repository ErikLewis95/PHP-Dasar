<link rel="stylesheet" href="style.css">
<!-- Update data -->


<!-- UPLOAD (FILE HANDLING)
1. <input type='file' >
2. atribut form enctype(encoding type) tipe encoding apa yang seperti apa yang digunakan untuk menangani sebuah file, sebelumnya membahas type="text"
3. variable superglobal $_FILES khusus dibuat untuk menangani data file
4. move_uploaded_file 
noted: sebenernya data gambar dll bisa dimasukkan ke dalam database langsung karna didalam mysql ada type data yang namanya blob(binary large object) tidak disarkan untuk menyimpan file langsung ke database dikarenaka ukuran database akan menjadi sangat besar dan menjadi berat karena ukuran yng besar, karena kita bekerja dengan file, file tempatnya di dalam didalam directory, sementara nama filenya akan disimpan kedalam database sebagai string  -->


<?php 
session_start(); 
//jika tidak ada sesion login maka kembali ke login
if ( !isset($_SESSION['login'])){
header("Location: login.php");
exit;
} 

require 'function.php';
//koneksi ke DBMS
// $db= mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data di URL
$id=$_GET["id"];
// var_dump($id);

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
<style>
        .gambar{
            witdh: 200px;
            height:200px;
        }
        .button{
           background:#2C97DF;
           color:white;
           border-top:0;
           border-left:0;
           border-right:0;
           border-bottom:5px solid #2A80B9;
           padding:10px 20px;
           text-decoration:none;
           font-family:sans-serif;
           font-size:11pt; 
        } 
    </style>
</head>
<center>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value= "<?= $mhs["id"]; ?>" />
        <input type="hidden" name="gambarLama" value= "<?= $mhs["gambar"]; ?>" />

<table border="1" cellpadding="10">
        <tr>
            <th><label for="nrp">NRP</label></th>
            <td><input 
            type="text" 
            name="nrp" 
            id="nrp" 
            required 
            class="input" 
            value="<?= $mhs["nrp"]; ?>">
        </td>
        </tr>
        <tr>
            <th><label for="nama">Nama</label></th>
            <td><input 
            type="text" 
            name="nama" 
            id="nama" 
            required 
            class="input" 
            value="<?= $mhs["nama"]; ?>"></td>
        </tr>
        <tr>
            <th><label for="email">Email</label></th>
            <td><input 
            type="text" 
            name="email" 
            id="email" 
            required 
            class="input" 
            value="<?= $mhs["email"]; ?>"></td>
        </tr>
        <tr>
            <th><label for="jurusan">Jurusan</label></th>
            <td><input 
            type="text" 
            name="jurusan" 
            id="jurusan" 
            required 
            class="input" 
            value="<?= $mhs["jurusan"]; ?>"></td>
        </tr>
        <tr>
            <th><label for="gambar">Gambar</label></th>
            <td><img class="gambar" src="img/<?= $mhs['gambar']; ?>"><br><br>
            <input 
            type="file" 
            name="gambar" 
            id="gambar" ></td>
        </tr>
    </table>
<!-- <li>
    <label for="id">id : </label>
    <input type="text" name="id" id="id" required value="<?= $mhs["id"]; ?>">
</li> -->
    <button type="submit" name="submit" class="button">Ubah</button>  | <a href="index.php" class="button">KEMBALI</a>

</form>
</body>
    </center>
</html>

    <!-- action dikosongkan ketika submit jalan maka datanya akan dikirim kehalaman ini; methode post digunakan agar saat megirimkan data ke database tidak memuat keynya di url sehingga tidak kepanjangan -->
<!-- untuk mengisi data didalam element formnya bisa menggunakan atrribut html value; jadi ketika user mengkli tmbl ubah nilai di dalam formnya merupakan isi dari atribut value itu sendiri-->
<!-- buat nilai value nrp sesuai dengan data di DB (value dinamis) -->
<!-- required ->user harus mengisi inputannya -->
<!-- key hubungannya sama name jika nama berubah maka harus didefinisikan pada isset -->
<!-- memasukkan value jurusan ke inputan -->
<!-- $id dalam function.php tidak ada di dalam inputan ubah.php namun user tidak perlu mengubah data id karena itu primary key yang tidak boleh duplicate apabila user mengubah data id akan terjadi erro karena user tidak mengetahui id yang belum digunakan dari table tsbt maka solusinya adalah agar $id tetap dikirim ke function.php tapi user tidak perlu mengetahui bahkan mengubahnya maka solusinya ada inputan tipenya hiden -->