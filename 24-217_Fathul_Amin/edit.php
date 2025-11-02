<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Master Supplier</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Edit Data Master Supplier</h2>
  <form action="proses_edit.php" method="post">
    <input type="hidden" name="id" value="<?= $d['id'] ?>">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $d['nama'] ?>" required><br>

    <label>Telp</label>
    <input type="text" name="telp" value="<?= $d['telp'] ?>" required><br>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= $d['alamat'] ?>" required><br>

    <button type="submit" class="btn btn-update">Update</button>
    <a href="index.php" class="btn btn-batal">Batal</a>
  </form>
</body>
</html>