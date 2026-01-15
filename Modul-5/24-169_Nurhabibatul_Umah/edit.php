<?php
require 'config.php';

if (!isset($_GET['id'])){
    header('Location: index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM supplier WHERE id=$id";
$query = mysqli_query($conn, $sql);
$supplier = mysqli_fetch_assoc($query);

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

    <title>Edit Data Supplier</title>

    <style>
        .row-form {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .row-form label {
            width: 120px;
            font-weight: bold;
        }
        .row-form input {
            flex: 1;
        }
    </style>
</head>

<body class="bg-light">

<div class="container" style="max-width: 700px; margin-top: 40px;">
    <h3 style="color: #67b1e5;">Edit Data Master Supplier</h3>
    <hr>

    <form action="proses_edit.php" method="POST">

        <input type="hidden" name="id" value="<?= $supplier['id'] ?>">

        <div class="row-form">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $supplier['nama'] ?>" required>
        </div>

        <div class="row-form">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" value="<?= $supplier['telp'] ?>" required>
        </div>

        <div class="row-form">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $supplier['alamat'] ?>" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>
    </form>
</div>
</body>
</html>