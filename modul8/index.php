<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
</head>
<body>
    <div class="nav">
        <div class="left">
            <strong>Sistem Penjualan</strong>
            <!-- Menu: Berdasarkan level -->
            <?php if($_SESSION['level']=="1"){ ?>
                <a href="home.php">Home |</a>
                <a href="master.php">Data Master |</a>
                <a href="transaksi.php">Transaksi |</a>
                <a href="laporan.php">Laporan</a>
            <?php } else { ?>
                <a href="home.php">Home |</a>
                <a href="transaksi.php">Transaksi |</a>
                <a href="laporan.php">Laporan</a>
            <?php } ?>
        </div>
        <div class="right">
            <span class="username"><?= htmlspecialchars($_SESSION['nama']); ?></span>
            <a href="logout.php" >Logout</a>
        </div>
    </div>

    <div class="content">
        <h2>Selamat datang, <?= htmlspecialchars($_SESSION['nama']); ?>!</h2>
        <p>Level Anda: <?= htmlspecialchars($_SESSION['level']); ?></p>
        <p>Pilih menu di navbar sesuai hak akses.</p>
    </div>
</body>
</html>
