<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'penjualan';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if($conn){
    echo "koneksi berhasil";
}else {
    echo "koneksi gagal";
}

