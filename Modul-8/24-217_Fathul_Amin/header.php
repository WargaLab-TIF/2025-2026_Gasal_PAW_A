<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

$user_id = $_SESSION['login'];
$q_user = mysqli_query($conn, "SELECT * FROM user WHERE id='$user_id'");
$user = mysqli_fetch_assoc($q_user);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="topbar">
    <div class="topbar-left">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <span style="color:white;"><b>
            Sistem Penjualan &nbsp;<i class="fas fa-store"></i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </b></span>

        <a href="home.php">Home</a>

        <?php if ($user['level'] == 1): ?>
            <a href="data_master.php">Data Master</a>
        <?php endif; ?>

        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="topbar-right">
        <span><?= $user['nama'] ?></span>
        <a href="logout.php">Logout</a>
    </div>
</nav>
</body>
</html>