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
?>