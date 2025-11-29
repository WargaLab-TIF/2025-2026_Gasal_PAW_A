<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location:../../login.php");
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

    <title>Tambah Data Pelanggan</title>

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
        .row-form textarea{
            width: 85%;
        }
        .row-form select{
            width: 85%;
        }
    </style>
</head>

<body class="bg-light">

<div class="container" style="max-width: 700px; margin-top: 40px;">
    <h3 style="color: #67b1e5;">Tambah Data Pelanggan Baru</h3>
    <hr>

    <form action="proses_tambah.php" method="POST">

        <div class="row-form">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" placeholder="Contoh: PLG001" required>
        </div>

        <div class="row-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

        <div class="row-form">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>


        <div class="row-form">
            <label for="telp">Telepon</label>
            <input type="number" name="telp" class="form-control" placeholder="Telepon" required>
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