<?php
session_start();
include "koneksi.php";
if ($_SESSION['level'] != 1) {
    echo "<script>alert('Akses Ditolak!'); window.location='dashboard.php';</script>";
    exit;
}
?>

<a href="dashboard.php">Kembali</a>
