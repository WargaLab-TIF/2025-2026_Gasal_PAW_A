<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

$level = $_SESSION['level']; 
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
    <style>
        body {
            font-family: Arial;
        }
        .navbar {
            background:#0b579a;
            padding: 12px;
            color:white;
        }
        .navbar a {
            color:white;
            margin:0 10px;
            text-decoration:none;
        }
        .nav-right {
            float:right;
        }
    </style>
</head>
<body>

<div class="navbar">
    <span><b>Sistem Penjualan</b></span>

    <a href="home.php">Home</a>

    <?php if($level == 1){ ?>
        <a href="data_master.php">Data Master</a>
    <?php } ?>

    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>

    <span class="nav-right">
        <?= $username ?> |
        <a href="logout.php">Logout</a>
    </span>
</div>

<br>
<h2>Selamat Datang, <?= $username ?></h2>

</body>
</html>
