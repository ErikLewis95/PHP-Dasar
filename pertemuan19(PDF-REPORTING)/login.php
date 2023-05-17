<?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require 'function.php';

//cek cookie terlebih dahulu kalau ada berarti usernya masih login dan bisa dilihat datanya di inspect storage kalau gk ada berarti sesi cookienya sudah expire/belum->feature ini biasa disebut keep login
if (isset($_COOKIE['id']) && isset($_COOKIE['aku1ov3m3l4ny']) ){
    //cek apakah cookie isinya true atau bukan
    $id = $_COOKIE['id'];
    $aku1ov3m3l4ny = $_COOKIE['aku1ov3m3l4ny'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE
    id = $id ");
    $row= mysqli_fetch_assoc($result);

    //cek cookie dan username
    if($aku1ov3m3l4ny === hash('sha256', $row['username']) ){
        $_SESSION['login'] = true;
    }
}

//cek session jika ada sessionnya langsung pindah kehalaman index
if(isset($_SESSION['login'])) {
header("Location: index.php");
exit();

}

// ketika tombol login dipencet jalan kan line berikutnya
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
    $row = mysqli_fetch_assoc($result);//$row menyimpan data user yang login
    //kalau berhasil diverifikasi / passwordnya sama yang diketik dan database perbolehkan user masuk kedalam system
if (password_verify($password, $row["password"])){

// sebelum pindahkan usernya kehalaman index kita akan set sessionnya sehingga ketika kita berpindah" kehalaman lain ada gk sessionnnya, tapi jgn lupa start
    $_SESSION['login'] = true;

    //cek remember me ketika user checkbox 
    if(isset($_POST["remember"])){
        //buat cookie
        setcookie('id', $row['id'], time()+60);
        setcookie('aku1ov3m3l4ny', hash('sha256', ($row['username']), time()+ 60));
    }
    
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
    <link rel="stylesheet" href="css/style.css">
</head>
<center>
<body>
    


<!-- error hanya akan di set/ dibikin ketika memang terdapat error atau terjadi kesalahan dalam mengetik data password/username kemudian di cocokan ke dalma WPdb   -->
<?php if( isset($error)) : ?>
    <p style="color:red; font-style: italicl;">username atau password anda salah</p>
    <?php endif; ?>

<!-- action kosong karena mengelola data di halaman yang sama -->
<form action="" method="post">

    <table>
        <td colspan="2"  class="kepala">
        <h1 class="title">Halaman Login</h1>
        </td>
        <tr>
            <th><label for="username">USERNAME</label></th>
            <td><input type="text" name="username" id="username" class="input"></td>
        </tr>
        <tr>
            
            <th><label for="password">PASSWORD</label></th>
            <td><input type="password" name="password" id="password" class="input"></td>
        </tr>
        <td colspan="2" class="kaki">
            <nav class="container">
            <input type="checkbox" name="remember" id="remember">Remember me</input>
            <button type="submit" name="login" class="btn-hover color-4" >
    LOGIN
    </button> | <a href="register.php" class="btn-hover color-5"> REGISTER</a>
            </nav>
        </td>
    </table>
  

    <!-- typenya submit supaya datanya dikirinkan ke action -->
    
</form>
</body>
</center>
</html>