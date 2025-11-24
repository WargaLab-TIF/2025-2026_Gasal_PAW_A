<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../../login.php");
    exit;
}
require '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Data Barang</title>

    <style>
        .row-form {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .row-form label {
            width: 140px;
            font-weight: bold;
        }
        .row-form input {
            flex: 1;
        }
        .row-form select{
            flex: 1;
        }
    </style>
</head>

<body class="bg-light">

<div class="container" style="max-width: 700px; margin-top: 40px;">
    <h3 style="color: #67b1e5;">Tambah Data Barang</h3>
    <hr>

    <form action="proses_tambah.php" method="POST">

        <div class="row-form">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
        </div>

        <div class="row-form">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
        </div>

        <div class="row-form">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>

        <div class="row-form">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
        </div>

        <div class="row-form">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>

                <?php
                $supplier = mysqli_query($conn, "SELECT * FROM supplier ORDER BY nama ASC");
                while ($row = mysqli_fetch_assoc($supplier)):
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>

    </form>
</div>

</body>
</html>
