<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tp6_sulton"; // bebas, nanti kita buat di phpMyAdmin

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>