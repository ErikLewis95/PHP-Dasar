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

    //upload gambar
    $gambar = upload();
    //1.kalau berhasil gambar diupload 2 akan mengirimkan nama gambar ke $gambar 
    // kalau yang dikirim fungsi upload() gagal  fungsi insert into diberhentikan
    if( !$gambar ){
        return false;
    }

        $query = "INSERT INTO mahasiswa
            VALUES
            ('','$nrp','$nama', '$email', '$jurusan', '$gambar')";

     mysqli_query($db, $query);

     return mysqli_affected_rows($db);
}

function upload(){
    // return false; ->gagal karna mengembalikan nilai false
    // gambar didapat dari atribut input name tambah.php
$namaFile = $_FILES['gambar']['name'];//nama file yang lama sesuai yang diupload user
$ukuranFile = $_FILES['gambar']['size'];
$error = $_FILES['gambar']['error'];
$tmpName= $_FILES['gambar']['tmp_name'];

//cek apakah tidak ada gambar yang diupload
if( $error === 4 ){
    echo "<script>
    alert('pilih gambar terlebih dahulu! ');
    </script>";
    return false;
    //berhentikan fungsi upload supaya memberitahu jika fungsi uploadnya gagal fungsi tambah gagal juga
}
//4 merupakan nilai dari superglobal files dimana artinya tidak ada file yang diupload

//cek apakah yang diupload adalah ekstensi yang diizinkan merupakan gambar,gunanya dibuat aturan dalam mengupload ektensi adalah agar ketika ada user yang usil mengupload file yang bukan merupakan gambar misalnya video, exe, dan file" hack yang berbahaya maka harus dilakukan pembatasan ekstensi
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile); 
// ekstensi gambar yang diupload oleh user
$ekstensiGambar = strtolower(end($ekstensiGambar));
//problem1 : explode merupakan sebuah fungsi php yang digunakan untuk memecah sebuah string menjadi array contoh: sandhika.jpg=["sandhika", "jpg"], problem2 : fungsi end mengambil string yang paling akhir jadi kalau ada nama file sandhika.galih.jpg["sandhika", "galih","jpg"] maka kalau yang diambil dengan mengunakan index maka ekstensinya jadi gk keabil $ekstensiGambar[1] karena index 1 hasilnya adalah 'galih'; problem 3 jika ada nama file dengan ekstensinya semua kapita contoh : sandhika.JPH->ini juga ekstensi yang sah namun tidak masuk ke $ekstensiGambarValid jadi biar ensktensinya huruf kecil semua maka gunakan fungsi strtolower.

//cek apakah ektensi gambar yang diupload ada dalam $ekstensiGambarValid
if( !in_array ($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
    alert('file yang anda upload bukan gambar! ');
    </script>";
    return false;
}
//in_array -> mengecek apakah ada sebuah string didalam sebuah array analoginya mencari jarum(needle) dalam jerami(haystack), jarumnya $ekstensiGambar yang diupload user, $ekstensiGambarValid ekstensi yang diizinkan fungsi in_array akan jalan jika menghasilkan true dan berhenti ketika false; jadi ketika user mengupload file exe maka pesan yang ditampilkan adalah bukan gambar.

//cek jika ukuran file yang diupload diizinkan > 1mb tdk diizinkan
if( $ukuranFile > 1000000) {
echo "<script>
    alert('ukuran file yang anda upload terlalu besar! ');
    </script>";
    return false;
}

//generate nama gambar baru;  hal ini di lakukan karena jika ada user berbeda upload file yang berbeda tapi nama filenya sama maka file yang baru masuk akan menimpa file pertama yang sudah dimasukkan oleh user lain, uniqid() fungsi yang digunakan untuk membangkitkan string random angka yang dijadikan namabaru file dengan nama yang sama;
$namaFileBaru = uniqid();
// var_dump($namaFileBaru);die;
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;
// var_dump($namaFileBaru);die; contoh hasilnya : 6455278811423.jpeg
//lolos pengecekan, gambarsiap diupload
move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

return $namaFileBaru;
//return $namaFile; kenapa direturn namafile supaya nama gambarnya bisa dimasukan ke $gambar = upload(); sehingga nama file tesebut bisa dimasukkan ke insert into $gambar
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
    $gambarLama =htmlspecialchars($data["gambarLama"]);
   
   //cek apakah user pilih gambar baru atau lama 
   if($_FILES['gambar']['error']=== 4){
    $gambar = $gambarLama;
   }else{

       $gambar = upload();
   }


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

function register($data){
    global $db;

    //stripslashes->fungsi yang gunanya menghilangkan tanda \ 
//strtolower -> fungsi yang membuat semua karakter mencadi huruf kecil;
//mysqli_real_escape_string -> memungkinkan user memasukkan password ada tanda kutipnya dan tanda kutip dimasukkan ke db secara aman
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2= mysqli_real_escape_string($db, $data["password2"]);
 
    //cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

    if( mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }

    //cek konfirmasi password
    if( $password !== $password2){
    echo "<script>
    alert('konfirmasi password tidak sesuai!');
    </script>";
    return false;
}

//enkripsi password jangan pakai md5 karena kalau dimasukkan ke google password acaknya langsung bisa diketahui nilai sesugguhnya gunakan fungsi hash()
//contoh isi password_hash = "$2y$10$/myInH0P/2zM5tYaGR6rzuYR1vNRyEjNMW4W3vBF5m9CaSOThsNHy"; MD5= "7815696ecbf1c96e6894b779456d330e"
 //PASSWORD_DEFAULT ->algoritma yang dipilih secara default oleh php; algoritma ini akan selalu berubah ketika ada cara pengamanan baru; lihat documentasi php :https://www.php.net/manual/en/function.password-hash.php
// $password = MD5($password); 
 $password = password_hash($password, PASSWORD_DEFAULT); 
// var_dump($password); die; 


//tambahkan userbaru ke dalam database 
mysqli_query($db, "INSERT INTO users VALUES ('', '$username', '$password')");

return mysqli_affected_rows($db);
}

?>