<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login.php");
    exit;
}

$level = $_SESSION['level'] ?? 0;
$username = $_SESSION['username'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: 0.3s;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Penjualan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="index.php"></i> Home</a></li>
                
                <?php if ($level == 1): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="masterDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="masterDropdown">
                        <li><a class="dropdown-item" href="master/barang/index.php">Data Barang</a></li>
                        <li><a class="dropdown-item" href="master/supplier/index.php">Data Supplier</a></li>
                        <li><a class="dropdown-item" href="master/pelanggan/index.php">Data Pelanggan</a></li>
                        <li><a class="dropdown-item" href="master/user/index.php">Data User</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item"><a class="nav-link" href="transaksi/transaksi.php"></i> Transaksi</a></li>
                <li class="nav-item"><a class="nav-link" href="laporan/index.php">Laporan</a></li>
            </ul>

            <span class="navbar-text text-white me-3">
                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($username); ?>
            </span>
            <a class="btn btn-light btn-sm" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="container my-4">
    <h2 class="mb-4">Selamat Datang, <?= htmlspecialchars($username); ?>!</h2>

    <div class="row g-4">

        <!-- Card Home -->
        <div class="col-md-3">
            <div class="card card-hover text-center p-3">
                <i class="bi bi-house-door-fill display-4 text-primary"></i>
                <h5 class="mt-2">Home</h5>
                <p class="text-muted small">Halaman utama dashboard</p>
            </div>
        </div>

        <!-- Card Master (level 1) -->
        <?php if ($level == 1): ?>
        <div class="col-md-3">
            <div class="card card-hover text-center p-3">
                <i class="bi bi-archive-fill display-4 text-success"></i>
                <h5 class="mt-2">Data Master</h5>
                <p class="text-muted small">Kelola barang, supplier, pelanggan, user</p>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card Transaksi -->
        <div class="col-md-3">
            <div class="card card-hover text-center p-3">
                <i class="bi bi-currency-exchange display-4 text-warning"></i>
                <h5 class="mt-2">Transaksi</h5>
                <p class="text-muted small">Kelola transaksi penjualan</p>
            </div>
        </div>

        <!-- Card Laporan -->
        <div class="col-md-3">
            <div class="card card-hover text-center p-3">
                <i class="bi bi-file-earmark-text display-4 text-danger"></i>
                <h5 class="mt-2">Laporan</h5>
                <p class="text-muted small">Lihat laporan penjualan</p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
