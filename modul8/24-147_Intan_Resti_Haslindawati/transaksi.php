<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>

<a href="dashboard.php">Kembali</a>
