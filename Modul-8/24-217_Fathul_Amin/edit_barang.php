<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
$b = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Barang</h2>

<form action="proses_edit_barang.php" method="post">

<input type="hidden" name="id" value="<?= $b['id'] ?>">
<input type="hidden" name="supplier_id" value="<?= $b['supplier_id'] ?>">

<label>Kode Barang</label>
<input type="text" name="kode_barang" value="<?= htmlspecialchars($b['kode_barang']) ?>" required><br>

<label>Nama Barang</label>
<input type="text" name="nama_barang" value="<?= htmlspecialchars($b['nama_barang']) ?>" required><br>

<label>Harga</label>
<input type="number" name="harga" value="<?= htmlspecialchars($b['harga']) ?>" required><br>

<label>Stok</label>
<input type="number" name="stok" value="<?= htmlspecialchars($b['stok']) ?>" required><br>

<button type="submit" class="btn btn-update">Update</button>
<a href="supplier_detail.php?id=<?= $b['supplier_id'] ?>" class="btn btn-batal">Batal</a>

</form>

</body>
</html>