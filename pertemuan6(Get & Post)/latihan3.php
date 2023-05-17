<!-- SuperGlobal variabel $_POST -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <?php if( isset($_POST["submit"])) : ?>
    <h1>Halo, Selamat Datang <?= $_POST["nama"]; ?> </h1>
   <?php endif; ?>
    <!-- cek apakah tombol submit sudah pernah dipencet tampilkan line 12 jika belum kosong-->
<form action="" method="post">
    <!-- action bisa diisikan datanya akan dikirimkan ke mana contoh:latihan4.php atau bisa dikosongkan maka datanya akan dikirimkan kehalaman ini sendiri begitu juga apabila dihapus dan apabila methodnya dihapus maka secara default nilainya adalah get 
   noted: hati" dalam penulisan attribut jika tidak dituliskan maka ada nilai default yang dikirim -->
    Masukkan nama :
    <input type="text" name="nama">
    <br>
    <button type="submit" name="submit">Kirim</button>
   </form> 
</body>
</html>

<!-- 2 atribut type dan name harus ada didalam input, karena name merupakan key array assosiative yang mempunyai key name dan value nama-->