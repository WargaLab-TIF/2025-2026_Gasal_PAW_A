<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location:../../login.php");
    exit;
}
require '../../config.php';

$id_user = $_GET['id_user'];

$sql = "SELECT * FROM user WHERE id_user=$id_user";
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

    <title>Edit Data User</title>

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
    <h3 style="color: #67b1e5;">Edit Data User</h3>
    <hr>

    <form action="proses_edit.php" method="POST">

        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
        
        <div class="row-form">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
        </div>

        <div class="row-form">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="<?= $user['password'] ?>" required>
        </div>

        <div class="row-form">
            <label for="nama">Nama User</label>
            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" required>
        </div>

        <div class="row-form">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"><?= $user['alamat'] ?></textarea>
        </div>

        <div class="row-form">
            <label for="hp">Nomor HP</label>
            <input type="number" name="hp" class="form-control" value="<?= $user['hp'] ?>" required>
        </div>

        <div class="row-form">
            <label for="level">Jenis User</label>
            <select name="level" id="level" class="form-select">
                <option value="0" <?php if($user['level'] == 0) echo "selected"; ?> >Owner</option>
                <option value="1" <?php if($user['level'] == 1) echo "selected"; ?> >Admin</option>
                <option value="2" <?php if($user['level'] == 2) echo "selected"; ?> >Kasir</option>
                <option value="3" <?php if($user['level'] == 3) echo "selected"; ?> >Staff</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
        <a href="index.php" class="btn btn-danger btn-sm">Batal</a>
    </form>
</div>
</body>
</html>