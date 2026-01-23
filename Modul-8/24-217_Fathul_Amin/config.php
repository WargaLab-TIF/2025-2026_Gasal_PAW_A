<?php
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>