<link rel="stylesheet" href="style.css">
<?php 
require 'function.php';

if( isset($_POST["register"])){
    if( register($_POST) > 0 ){
        echo "<script>
        alert('userbaru berhasil ditambahkan!');
        </script>";
    }else{
        echo mysqli_error($db);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
<style>
    label{
       display: block; 
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
    

    <form action="" method="post">

    <table>
        <td colspan="2" style="text-align: center;">
    <h1>Halaman Registrasi</h1>
    </td>
        <tr>
            <th><label for="username">USERNAME</label></th>
            <td><input type="text" name="username" id="username" class="input"></td>
        </tr>
        <tr>
            <th><label for="password">PASSWORD</label></th>
            <td><input type="password" name="password" id="password" class="input"></td>
        </tr>
        <tr>
            <th><label for="password2">CONFIRM PASSWORD</label></th>
            <td><input type="password" name="password2" id="password2" class="input"></td>
        </tr>
         <td colspan="2" style="text-align: center;">
    <button type="submit" name="register" class="button">REGISTER</button> | <a href="login.php" class="button">LOGIN</a>
    </td>
    </table>





    </form>
</body>
</center>
</html>