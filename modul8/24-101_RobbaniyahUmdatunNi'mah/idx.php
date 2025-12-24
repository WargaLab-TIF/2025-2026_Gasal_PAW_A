<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$level = $_SESSION['level'];
$username = $_SESSION['username'];
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f8f9fa; }
        .navbar {
            background: #2c3e50;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
        }
        .navbar a:hover {
            background: #34495e;
        }
        .user-info {
            /* background: #e74c3c; */
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="menu">
            <a href="idx.php">Home</a>

            <?php if ($level == 1): ?>
                <a href="dataMaster.php">Data Master</a>
            <?php endif; ?>

            <a href="Copy TP6/transaksi.php">Transaksi</a>
            <a href="Copy TP7/laporan.php">Laporan</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="user-info">
            Halooo, <?= $nama ?>!
        </div>
    </div>

    <div class="content">
        <img src="https://media.giphy.com/media/fN4OmM0gfbSePd4NzA/giphy.gif" 
             style="width:200px; margin-top:20px;">
        <h2>Selamat Datang di Sistem Penjualan</h2>
        <p>Anda login sebagai user level <?= $level ?></p>

    </div>
</body>
</html>