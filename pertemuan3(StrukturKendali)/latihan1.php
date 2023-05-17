<!-- php umumnya membaca scipt dari atas kebawah dan dari kiri kekanan tetapi dengan menggunakan controol flow pembacaan script bisa saja tidak seperti tersebut-->

<!-- Pengulangan digunakan ketika mengerjakan sebua script program tanpa harus menulis ulang scriptnya; syntax yang harus di pahami
1.for 
2. while ;  apa yang dapat dilakukan menggunakan for juga sama halnya menggunakan while
3. do. while
4. foreach(spesifik untuk Array)
konsepnya ada 3 bagian ada nilai awal kondisi terminasi kondisi increment dan decrement(++ atau --) -->

<!-- Pengkondisian
1. if..else
2. if..else if.. else
3. ternary (operator untuk mengantikan syntak penulisan if..else yang sederhana)
4. switch -->


<?php 
// for ($i = 0; $i < 5; $i++){
//  echo "Hello World! <br>";
// }
//apakah 0 < 5 = true i++ (+1) apakah 1< 5 = true hingga mengulangannya bernilai false
// $i=0;


// while($i<5){
// echo "Hello World! <br>";
// $i++;//hati" jgn lupa menambahakan incrementnya kalau tidak maka akan terjadi looping forever
// }
//selama kondisinya bernilai true maka lakukan setiap yang ada di dalam bracketny. kalau nilainya false maka tidak akan pernah dijalankan kembali



// $i = 10;
// do{
//     echo "Hello World! <br>";
//     $i++;
// } while($i < 5);
//berbeda dengan while, do while jalankan dulu pengulangannya baru cek kondisinya minimal dikerjakan  1 kali kalau false, ketika kondisinya bernilai false maka jalankan kondisinya 1 kali
//contoh apakakah 10 < 5 = false maka jalankan dulu 1 kali si blocknya; apakah 11 < 5 = true maka proses dihentikan


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan1</title>
    <style>
        .warna-baris {
            background-color : silver;
        }
        </style>
</head>
<body>

 <table border="2" cellpadding="10" cellspacing="0" >  
<?php
// for ($i = 1; $i <= 3; $i++ ){
//     echo "<tr>";
//     for($j =1; $j <= 5; $j++){
//         echo "<td>$i, $j</td>";
//     } //untuk mengulang column table atau tdnyaa
//     echo "</tr>";
// }

?>


<?php for($i =1; $i <= 5; $i++) : ?> 
    <!-- $i untuk mencetak baris -->
    <?php if($i % 2 == 1) : ?>
        <!-- untuk mewarnai baris ganjil 3:2 sisa bagi =1 ; 5:2 sisa baginya = 1 -->
    <tr class="warna-baris">
        <?php else : ?> 
            <!-- : = { -->
            <tr>
        <?php endif; ?>
        <?php for($j =1; $j <= 5; $j++) : ?> 
            <!-- $j untuk mencetak column -->
            <td><?= "$i, $j"; ?></td>
        <?php endfor; ?>
    </tr> 
<?php endfor; ?>

</table>
</body>
</html>


 