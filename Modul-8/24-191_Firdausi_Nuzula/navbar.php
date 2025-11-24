<?php
$level = $_SESSION['level'];
$username = $_SESSION['username'];
?>

<style>
.navbar {
    background: #0b3d78;
    padding: 10px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: Arial, sans-serif;
}
.nav-left a {
    color: white;
    margin-right: 20px;
    text-decoration: none;
    font-weight: bold;
}
.nav-right {
    display: flex;
    align-items: center;
    gap: 15px;
    font-weight: bold;
}
.nav-right a {
    color: white;
    text-decoration: none;
}
</style>

<div class="navbar">

    <div class="nav-left">
        <a href="index.php">Sistem Penjualan |</a>

        <a href="index.php">Home</a>

        <?php if ($level == 1): ?>
            <a href="data_master.php">Data Master</a>
        <?php endif; ?>
     
        <a href="transaksi_form.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="nav-right">
        Halo, <?= $username ?>
        &nbsp; | &nbsp;
        <a href="logout.php" style="color: white; text-decoration:none; font-weight:bold;">Logout</a>
    </div>

</div>

