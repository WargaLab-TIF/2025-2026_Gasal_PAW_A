<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../../login/login.php");
    exit;
}
require '../../config.php';
$level = $_SESSION['level'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data User</title>
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand" href="../../index.php">Sistem Penjualan</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU -->
            <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="../../index.php">Home</a>
                </li>
                <?php if ($level == 1): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button"
                        data-bs-toggle="dropdown">
                        Data Master
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../barang/">Data Barang</a></li>
                        <li><a class="dropdown-item" href="../supplier/">Data Supplier</a></li>
                        <li><a class="dropdown-item" href="../pelanggan/">Data Pelanggan</a></li>
                        <li><a class="dropdown-item" href="../user/">Data User</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link active" href="../../transaksi/transaksi.php">Transaksi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="../../laporan/index.php">Laporan</a>
                </li>
            </ul>

            <!-- USER LOGIN + LOGOUT -->
            <span class="navbar-text text-white me-3">
                <?= $_SESSION['username']; ?>
            </span>
            <a href="../../logout.php" class="btn btn-light btn-sm">Logout</a>

        </div>
    </div>
</nav>
<!-- END NAVBAR -->


<div class="container mt-4">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3 class="mb-0" style="color: #67b1e5;">Daftar Supplier</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="tambah.php" class="btn btn-success mb-3">Tambah Data</a>
        </div>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <p>
            <?= $_GET['status'] == 'sukses' ? "Supplier berhasil ditambahkan" : "Gagal menambahkan Supplier"; ?>
        </p>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Tindakan</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM supplier");
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['telp'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
