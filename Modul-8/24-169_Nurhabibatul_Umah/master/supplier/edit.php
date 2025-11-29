<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location:../../login.php");
    exit;
}
require '../../config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM supplier WHERE id=$id";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);

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
    <h3 style="color: #67b1e5;">Edit Data Supplier</h3>
    <hr>

    <form action="proses_edit.php" method="POST">

        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <div class="row-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" required>
        </div>

        <div class="row-form">
            <label for="telp">Telepon</label>
            <input type="telp" name="telp" class="form-control" value="<?= $user['telp'] ?>" required>
        </div>

        <div class="row-form">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"><?= $user['alamat'] ?></textarea>
        </div>

        <div class="row-form">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>
    </form>
</div>
</body>
</html>