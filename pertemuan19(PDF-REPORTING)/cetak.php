<?php
session_start(); 
//jika tidak ada sesion login maka kembali ke login
if ( !isset($_SESSION['login'])){
header("Location: login.php");
exit;
} 

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Mahasiswa </h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        </tr>';

        $i = 1;
        foreach( $mahasiswa as $row ) {
            $html .= '<tr>
            <td>'.  $i++ .'</td>
            <td><img src="img/'. $row["gambar"].'" width="200px" height="200px" ></td>
            <td>'.$row["nrp"].' </td>
            <td>'.$row["nama"].' </td>
            <td>'.$row["email"].' </td>
            <td>'.$row["jurusan"].' </td>
            </tr>';
        }

 $html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', 'I');

?>
<!-- dilakukanpenggabungan '..' didalam html maka keluarkan variabel tersebut agar tidak dibaca sebagai sting sehinggak dia dalam bentuk php kemudian gabungkan yang satu dengan yang lain dengan .= -->
<!-- mpdf support css: https://mpdf.github.io/css-stylesheets/supported-css.html -->
<!-- baca document: output()=https://mpdf.github.io/reference/mpdf-functions/output.html -->
