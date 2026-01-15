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

    <title>Tambah Data User</title>

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
    <h3 style="color: #67b1e5;">Tambah Data User Baru</h3>
    <hr>

    <form action="proses_tambah.php" method="POST">

        <div class="row-form">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="row-form">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="row-form">
            <label for="nama">Nama User</label>
            <input type="text" name="nama" class="form-control" placeholder="nama" required>
        </div>

        <div class="row-form">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
        </div>

        <div class="row-form">
            <label for="hp">Nomor HP</label>
            <input type="number" name="hp" class="form-control" placeholder="Nomor HP" required>
        </div>

        <div class="row-form">
            <label for="level">Jenis User</label>
            <select name="level" id="level" class="form-select">
                <option value="">Pilih Jenis User</option>
                <option value="1">1 - Admin</option>
                <option value="2">2 - Kasir</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>
    </form>
</div>
</body>
</html>