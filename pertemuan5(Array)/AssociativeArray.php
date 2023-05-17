<?php 
// Pengulangan pada array
// menampilkan Array untuk user for /foreach

//array Biasa
$number = [1,2,3,4,5,6,7,8,9,10];
//Array multidimensi
$angka = [
    [3,2,9],
    [20,11,100],
    [100,200,300]
];
echo"<h5>Mencetak Array Multidimensi Numerik dari Index 0 dan Index 1 </h5>";
echo $angka[0][0];//dimana untuk mencetak nilai yang ada didalamnya harus membuka index array diluarnya baru masukkan index yang ada didalamnya 
echo"<h5>Mencetak Array Multidimensi Numerik dari Index 1 dan Index 1  </h5>";
echo $angka[1][1];
echo"<h5>Mencetak Array Multidimensi Numerik dari Index 2 dan Index 2  </h5>";
echo $angka[2][2];
echo "<br>";
echo "<br>";

$student = [ 
["Erik Lewis", "043040023", "Teknik Informatika", "eriksimaremare@gmail.com"],
["Ifandi Gilbert", "099789986", "Teknik Mesin", "ifandigilbert@gmail.com"],
["Sandhika Galih", "086812689", "Teknik Sipil", "sandhikagalih@gmail.com"]
];


//Assosiative Array = sebuah variabel yang memiliki banyak nilai dan pasangan antara key dan value(sefenisinya sama seperti array numerik), pada array assosiative keynya adalah string yang kita buat sendiri 
$mahasiswa = 
[
    [
 "Nama"    => "Steve Jobs", 
 "NRP"     => "043040023", 
 "Jurusan" => "Teknik Informatika", 
 "Email"   => "stevejobs@gmail.com",
 "gambar"  => "steve.jpg"
    ],
      [
 "Nama"    => "Elon Musk", 
 "NRP"     => "099789986", 
 "Jurusan" => "Teknik Mesin", 
 "Email"   => "elonmusk@gmail.com",
 "gambar"  => "elon.jpg",
 "Tugas"   => [80,90,100]
    ],
];

echo"<h1>Mencetak Assosiative  Multidimensi Array<h1>";
// echo $mahasiswa["Jurusan"]; mencetak array jika didalam nya hanya terdampat satu array
//mencetak multidimendi asosiave array
echo $mahasiswa[1]["Email"]; 
echo "<br>";//kotak terluarnya masih dibungkus dengan  numerik array sehingga kita dapat memanfaatkan indexnya tetapi setelah masuk kedalam bungkus yang kedua maka defenisikan key nya
echo $mahasiswa[1]["Tugas"][2]; //kotak terluarnya masih dibungkus dengan  numerik array sehingga kita dapat memanfaatkan indexnya tetapi setelah masuk kedalam bungkus yang kedua maka defenisikan key nya
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assosiative Array</title>
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
.gambar{
            width: 250px;
            height:250px;
}
        .kotak:hover{
            transform: rotate(360deg);
            border-radius: 50%; 
        }
        .clear { clear:both;}
        </style>
</head>
<body>
    <h2>Mencetak Array</h2>
    <div class="kotak">0</div>

    <?php foreach ($number as $num) : ?>
    <div class="kotak"><?php echo $num; ?> </div>
    <?php endforeach; ?>

    <div class="clear"></div>

    <h2> Mencetak Array Multidimensi</h2>
    <?php foreach($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
        <div class="kotak"><?= $b; ?> </div>
    <?php endforeach; ?>
    <div class="clear"></div>
    <?php endforeach; ?>

    <h1> Mencetak Numerik Array </h1>
    <?php foreach ( $student as $mhs ) : ?>
    <ul>
    <li>Nama    :   <?= $mhs[0]; ?></li>
    <li>NRP     :   <?= $mhs[1]; ?></li>
    <li>JURUSAN :   <?= $mhs[2]; ?></li>
    <li>Email   :   <?= $mhs[3]; ?></li></br>
  </ul>
  <?php endforeach; ?>

<h1> Mencetak Associative Array </h1>
     
<?php foreach ( $mahasiswa as $mhs ) : ?>
    <ul>
    <li>
        <img class="gambar" src="img/<?= $mhs["gambar"]; ?>">
    </li>
    <li>Nama    :   <?= $mhs["Nama"]; ?></li>
    <li>NRP     :   <?= $mhs["NRP"]; ?></li>
    <li>JURUSAN :   <?= $mhs["Jurusan"]; ?></li>
    <li>Email   :   <?= $mhs["Email"]; ?></li></br>
  </ul>
  <?php endforeach; ?>

</body>
</html>