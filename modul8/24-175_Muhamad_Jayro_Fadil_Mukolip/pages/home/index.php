<?php
require __DIR__ . '/../../conn.php';
require __DIR__ . '/../../tindakan/middleweres.php';
require __DIR__ . '/../tamplate/header.php';

// Ambil nama user untuk ditampilkan
$namaUser = $_SESSION['login']['nama'] ?? 'User';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">APP GUDANG</a>
        
        <div class="d-flex align-items-center text-white">
            <span class="me-3">Halo, <strong><?= htmlspecialchars($namaUser) ?></strong></span>
            <a href="../../tindakan/logout.php" class="btn btn-light btn-sm text-primary fw-bold">
                Log Out
            </a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h2 class="fw-light">Selamat Datang Kembali, <span class="fw-bold text-primary"><?= htmlspecialchars($namaUser) ?></span></h2>
                    <p class="text-muted mb-0">Silakan pilih menu di bawah untuk mengelola data.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <?php if ($_SESSION['login']['level'] < 4) { ?>
            <div class="col-md-6 col-lg-3">
                <a href="../../option/user/index.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">User Data</h5>
                            <p class="card-text text-muted small">Kelola data pengguna</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="../../option/index.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Supplier</h5>
                            <p class="card-text text-muted small">Data pemasok barang</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="../../option/cetak/penjualan.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Laporan</h5>
                            <p class="card-text text-muted small">Lihat laporan transaksi</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="../../option/barang/barang.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Gudang</h5>
                            <p class="card-text text-muted small">Stok dan data barang</p>
                        </div>
                    </div>
                </a>
            </div>

        <?php } else { ?>
            <div class="col-md-6">
                <a href="../../option/cetak/penjualan.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-5">
                        <div class="card-body">
                            <h3 class="card-title text-primary fw-bold">Laporan</h3>
                            <p class="card-text text-muted">Cek riwayat dan laporan</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="../../option/barang/barang.php" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-card text-center py-5">
                        <div class="card-body">
                            <h3 class="card-title text-primary fw-bold"> Barang</h3>
                            <p class="card-text text-muted">lihat barang di gudang</p>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        background-color: #f8f9fa;
    }
</style>

<?php
require __DIR__ . '/../tamplate/footer.php';
?>