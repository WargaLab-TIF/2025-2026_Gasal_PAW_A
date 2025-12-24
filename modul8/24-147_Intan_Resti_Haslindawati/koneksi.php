<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'login';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if(!$conn){
    die ('koneksi gagal'.mysqli_connect_error());
}
?>