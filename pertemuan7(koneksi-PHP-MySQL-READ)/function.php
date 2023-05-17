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
?>