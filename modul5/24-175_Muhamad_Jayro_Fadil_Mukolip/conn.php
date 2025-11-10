<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'contoh';
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    echo 'gagal cik' . mysqli_connect_error($conn);
}
?>