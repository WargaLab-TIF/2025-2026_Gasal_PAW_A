<?php 
session_start();
include 'koneksi.php';


if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Sistem Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar-custom">
        
        <div class="nav-left">
            <a href="index.php" class="nav-title">Sistem Penjualan</a>
            
            <a href="index.php">Home</a>

            <?php if($_SESSION['level'] == "admin") { ?>
                <div class="dropdown">
                    <button class="dropbtn">Data Master &#9662;</button>
                    <div class="dropdown-content">
                        <a href="supplier.php">Data Supplier</a>
                        </div>
                </div>
            <?php } ?>

            <a href="tambah_nota.php">Transaksi</a>
            <a href="index_laporan.php">Laporan</a>
        </div>

        <div class="nav-right">
            <span>Halo, <b><?php echo $_SESSION['nama']; ?></b> (<?php echo ucfirst($_SESSION['level']); ?>)</span>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>

    </div>
    <div class="container">
        
        <h2 style="text-align: left; border-bottom: 1px solid #ddd;">Dashboard</h2>

        <div style="background-color: #eaf6ff; padding: 30px; border-radius: 8px; border: 1px solid #bce8f1; text-align: center; margin-top: 20px;">
            <h3 style="color: #0056b3; margin-bottom: 10px; border-bottom: none;">Selamat Datang di Sistem Penjualan</h3>
            
            <p style="font-size: 16px; color: #555;">
                Halo, <b><?php echo $_SESSION['username']; ?></b>! <br>
                Semoga harimu menyenangkan. Silakan gunakan menu navigasi di atas untuk mengelola data.
            </p>
            
            <hr style="border-top: 1px solid #d6e9f9; width: 50%; margin: 20px auto;">
            
            <p style="font-size: 14px; color: #777;">
                Hari ini: <?php echo date('l, d F Y'); ?>
            </p>
        </div>

        <div style="background-color: #fff3cd; color: #856404; padding: 15px; margin-top: 20px; border: 1px solid #ffeeba; border-radius: 4px; text-align: center;">
             <b>Info:</b> Silahkan pilih menu di baris hitam bagian atas untuk memulai.
        </div>

    </div>

</body>
</html>