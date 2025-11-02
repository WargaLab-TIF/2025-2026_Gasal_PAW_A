<?php
require 'config.php';
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
    <h3 style="color: #67b1e5;">Tambah Data Master Supplier Baru</h3>
    <hr>

    <form action="proses_tambah.php" method="POST">

        <div class="row-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

        <div class="row-form">
            <label for="telp">Telp</label>
            <input type="number" name="telp" class="form-control" placeholder="Telp" required>
        </div>

        <div class="row-form">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>
    </form>
</div>
</body>
</html>