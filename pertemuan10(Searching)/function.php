<?php
//koneksi database  
$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $db;//variabel $db diluar function maka tidak dikenali gunakan global
    $result = mysqli_query($db, $query);
    $rows= [];
    while($row = mysqli_fetch_assoc($result)){
     $rows[] = $row;   
    }
    return $rows;
    //array associative
}

function tambah($data){
    global $db;
    //data yang diketikkan oleh user
    //jika user memasukkan data beru syntax html maka syntax tsbt tdk di render di web browser
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO mahasiswa
            VALUES
            ('','$nrp','$nama', '$email', '$jurusan', '$gambar')";

     mysqli_query($db, $query);

     return mysqli_affected_rows($db);
}

function hapus($id){
    global $db;
    mysqli_query($db, " DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($db);

}

function ubah($data){
global $db;
    //data yang diketikkan oleh user
    //jika user memasukkan data beru syntax html maka syntax tsbt tdk di render di web browser
    //id dari ubah.php udah ada $data tinggal ditangkap'
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

        $query = "UPDATE mahasiswa SET
           nrp ='$nrp',
           nama = '$nama', 
           email = '$email', 
           jurusan = '$jurusan', 
           gambar ='$gambar'
           WHERE id  = $id
           ";

     mysqli_query($db, $query);

     return mysqli_affected_rows($db);
}
// WHERE $id merupakan identifier jika tidak dimuat maka data yang akan terjadi adalah data yang akan di ubah semua data mahasiswa,
//$id tidah ada di dalam function ubah dan juga di file ubah.php agar identifier dikenali maka pada ubah.php tambahkan identifier $id

//dari index dikirim $_POST["keyword"] ditangkap oleh $keyword

//cari mahasiswa yang namanya berdasarkan $keyword yang diketik user masuk ke variabel $keyword contoh sandika galih
function cari($keyword){

$query= "SELECT * FROM mahasiswa WHERE
            nama LIKE '%$keyword%'OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
";

return query($query);
//assoc array panggil function diatas kedalam function cari masukkan ke dalam $mahasiswa di index.php
// SELECT * FROM mahasiswa WHERE
//             nama = Sandhika galih //mecari data sama percis dengan apa yang diketikkan user jika kurang berapa huruf saja maka data tidak akan tampil 
//SELECT * FROM mahasiswa WHERE
            //  nama LIKE '%$keyword%' //keyword sql dimana bisa ditaambahkan wildcard cari bisa pencarian field namanya yang sandhika/dhika/dhik/galih/gal dll % dibelakang artinya yang didenpan nya contoh san; belakangnya apapun
}

?>