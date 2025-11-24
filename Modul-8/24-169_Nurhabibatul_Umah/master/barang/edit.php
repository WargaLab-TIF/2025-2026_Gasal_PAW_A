<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../../login.php");
    exit;
}
require '../../config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM barang WHERE id = $id";
$query = mysqli_query($conn, $sql);
$barang = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Data Barang</title>

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
    <h3 style="color: #67b1e5;">Edit Data Barang</h3>
    <hr>

    <form action="proses_edit.php" method="POST">

        <input type="hidden" name="id" value="<?= $barang['id'] ?>">

        <div class="row-form">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="<?= $barang['kode_barang'] ?>" required>
        </div>

        <div class="row-form">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $barang['nama_barang'] ?>" required>
        </div>

        <div class="row-form">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $barang['harga'] ?>" required>
        </div>

        <div class="row-form">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $barang['stok'] ?>" required>
        </div>

        <div class="row-form">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>

                <?php
                $sup = mysqli_query($conn, "SELECT * FROM supplier ORDER BY nama ASC");
                while ($row = mysqli_fetch_assoc($sup)):
                ?>
                    <option value="<?= $row['id'] ?>"
                        <?= $row['id'] == $barang['supplier_id'] ? 'selected' : '' ?>> <?= $row['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>

    </form>
</div>
</body>
</html>