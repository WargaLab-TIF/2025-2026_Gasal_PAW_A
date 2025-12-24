<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "modul8");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
