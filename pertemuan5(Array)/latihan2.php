<?php 
// Pengulangan pada array
// menampilkan Array untuk user for /foreach
$angka = [3,2,9,20,11,70,100,200,300];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak{
            width: 50px;
            height:50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover{
            transform: rotate(360deg);
            border-radius: 50%; 
        }
        .clear { clear:both;}
        </style>
</head>
<body>

<?php for( $i = 0; $i < count($angka); $i++ ) { ?> 
      <!-- loping untung menampilkan data dalam variabel dihitung sebanyak <7 kali jika data bertambah maka data tersebut tidak akan ditampilakn kelayar jika data tersebut ingin ditampilkan ke layar maka gunakan fungsi count sehingga data yang ditampilkan sesuai dengan banyak data yang trdapat array suatu variabel -->
        <div class="kotak"><?php echo $angka[$i]; ?></div>
        <!--i=0 karena index array mulai dari 0 perintah untuk mencetak nilai dari variabel angka dengan paramenter index i -->
<?php } ?>

<div class="clear"></div>

<?php foreach($angka as $a ) { ?>
 <!-- foreach artinya untuk setiap elemen yang ada didalam array lakukan sesuatu; untuk setiap element angka(array) dan akan melalukan looping untuk tiap" element yang ada didalamnya; contohnya ambil satu elemen tampilkan, ambil satu element selanjutnya tampilkan pada saat mengabil satu element tersebut simpan didalam suatu variabel baru "as" apa? terserah baru variablenya tampilkan; agar lebih mudah memahaminya element dalam variabel $a merpresentasikan element" yang terdapat pada variable $angk dalam arti lain array $angka itu kita tulis dalam bentuk jamak dan as $a kita tulis dalam bentuk singularnya  contoh: $books as $book (books jamak - book singular); $students as student  -->
    <div class="kotak"><?php echo $a; ?></div>
<?php } ?>

<!-- memperbaiki syntax foreach menggunakan gaya penulisan templating-->
<div class="clear"></div>

<?php foreach($angka as $a ) : ?>
     <div class="kotak"><?= $a; ?></div>
     <?php endforeach; ?>
</body>
</html>