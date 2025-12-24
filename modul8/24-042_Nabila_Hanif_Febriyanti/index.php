<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$user  = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PENJUALAN</title>

    <style>

    body { 
        margin:0; 
        font-family: garamond;
    }
    .navbar { 
        background: #d63990ff; 
        color:white; 
        padding:14px 25px; 
        display:flex; 
        justify-content:space-between; 
        align-items:center; 
    }
    .menu a { 
        color:white; 
        text-decoration:none; 
        margin-right:25px; 
        font-weight:bold; 
    }
    .menu a:hover { 
        text-decoration:underline; 
    }
    .right { 
        font-weight:bold; 
    }

    </style>

</head>
<body>

<div class="navbar">
    <div class="menu">
        <a href="index.php">Home</a>

        <?php if ($level == 1): ?>
            <a href="data_master.php">Data Master</a>
        <?php endif; ?> 

        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="right">
        <?= $user ?> | 
        <a href="logout.php" style="color:blue;">Logout</a>
    </div>
</div>

<h2 style="padding:20px; text-align:center;">Selamat Datang di WEB kami, <?= $user ?>!</h2>

</body>
</html>