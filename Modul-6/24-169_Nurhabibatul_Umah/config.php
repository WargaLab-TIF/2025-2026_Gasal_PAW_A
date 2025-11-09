<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "kasir";
$conn = mysqli_connect($hostname, $username, $password, $db);
if ($conn){
     "Koneksi Berhasil";
}else{
    echo ("Koneksi Gagal");
}
?>