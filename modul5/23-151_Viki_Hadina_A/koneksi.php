<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'penjualan';

$koneksi = mysqli_connect($host,$user,$password,$db);

if (!$koneksi) {
    die('koneksi gagal'. mysqli_connect_error());
    // echo 'koneksi berhasil';
// } else {
//     echo 'koneksi berhasil';
}
?>