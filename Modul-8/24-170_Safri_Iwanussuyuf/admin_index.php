<?php 
session_start();
require "conn.php";
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .navbar { background-color: #333; overflow: hidden; padding: 10px; }
        .navbar a { float: left; color: white; text-align: center; padding: 12px 16px; text-decoration: none; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .logout { float: right; background-color: #d9534f; border-radius: 4px; }
        .user-info { float: right; color: white; padding: 12px 16px; }
        .container { padding: 40px; text-align: center; margin-top: 50px; }
        .btn-menu {
            display: inline-block;
            padding: 20px 40px;
            margin: 10px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            font-size: 20px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-menu:hover { background-color: #005f7f; transform: scale(1.05); }
        
        .dropdown { float: left; overflow: hidden; }
        .dropdown .dropbtn { font-size: 16px; border: none; outline: none; color: white; padding: 14px 16px; background-color: inherit; font-family: inherit; margin: 0; cursor: pointer;}
        .dropdown-content { display: none; position: absolute; background-color: #f9f9f9; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; }
        .dropdown-content a { float: none; color: black; padding: 12px 16px; text-decoration: none; display: block; text-align: left; }
        .dropdown-content a:hover { background-color: #ddd; }
        .dropdown:hover .dropdown-content { display: block; }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="user_index.php" style="background-color: #4CAF50;">Home</a>
        <a href="form_transaksi.php">Transaksi</a>
        <div class="dropdown">
            <button class="dropbtn">Data Master</button>
            <div class="dropdown-content">
                <a href="supplier.php">Master Supplier</a>
                <a href="barang.php">Master Barang</a>
            </div>
        </div>
        <a href="chart.php">Laporan</a> <a href="logout.php" class="logout">Logout</a>
        <span class="user-info">Halo, <b><?= $_SESSION['nama'] ?></b></span>
    </div>

    <div class="container">
        <h1>Selamat Datang, <?= $_SESSION['nama'] ?>!</h1>
        <p>Silakan pilih menu di bawah ini untuk mulai bekerja.</p>
        <br>
        
        <a href="form_transaksi.php" class="btn-menu">
        Mulai Transaksi Baru
        </a>

        <a href="admin_index.php" class="btn-menu" style="background-color: #e67e22;">
            Lihat Laporan Penjualan
        </a>
    </div>

</body>
</html>