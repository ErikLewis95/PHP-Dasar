<?php 
require 'function.php';

//ketika tombol login dipencet jalan kan line berikutnya
if (isset($_POST["login"])){
//form/data apapun yang diketikkan oleh user 
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE 
    username = '$username'");

    //cek username
    //mysqli_num_rows()-> menghitung berapa baris yang dikembalikan dari fungsi SELECT kalau ketemu nilainya 1 kalau tidak ada nilainya 0
if(mysqli_num_rows($result) === 1){

    //kalau ada cek password
    //ambil password dari db berdasarken $username
    // password_verify() kebalikan dari password_hash kalau hash fungsi mengacak string menjadi hash kalau verify ngecek sebuah string sama dengan hashnya parameternya ("string yang belum diacak", "string yang sudah diacak") atau ("password yang diketikkan olehuser $password", "password yang sudah dihash di dalam database")
    $row = mysqli_fetch_assoc($result);
    //kalau berhasil diverifikasi / passwordnya sama yang diketik dan database perbolehkan user masuk kedalam system
if (password_verify($password, $row["password"])){
header("Location: index.php");
exit;
}
}
$error =true;
}
// cara baca scipt : 1. kalau tidak ada username berati langsung keluar = $error kalau ada usernamenya masuk ke  line 19; 2. kalau dicek passwordnya tidak  sama yang diketik user dengan yang ada di database diline 21 langsung keluar ke $error kalau passwornya ternyata sama maka langsung pindah ke lokasi berikutnya index.php; dan logika if diatas tidak perlu menggunakan else karena ketika benar langsung ke halaman index.php dan exit sehingga tanpa elsepun $else tidak akan dikerjakan 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    
<h1>Halaman Login</h1>

<!-- error hanya akan di set/ dibikin ketika memang terdapat error atau terjadi kesalahan dalam mengetik data password/username kemudian di cocokan ke dalma WPdb   -->
<?php if( isset($error)) : ?>
    <p style="color:red; font-style: italicl;">username atau password anda salah</p>
    <?php endif; ?>

<!-- action kosong karena mengelola data di halaman yang sama -->
<form action="" method="post">
<ul>
    <li>
    <label for="username">USERNAME: </label>
    <input type="text" name="username" id="username">
    </li> <br>
    <li>
    <label for="password">PASSWORD:</label>
    <input type="password" name="password" id="password">
    </li> <br>
    <li>
    <!-- typenya submit supaya datanya dikirinkan ke action -->
    <button type="submit" name="login">
    LOGIN
    </button>
    </li>

</ul>
</form>

</body>
</html>