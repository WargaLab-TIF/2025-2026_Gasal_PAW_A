<?php
$supplier_id = $_GET['supplier_id'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Barang</h2>

<form action="proses_tambah_barang.php" method="post">

<input type="hidden" name="supplier_id" value="<?= htmlspecialchars($supplier_id) ?>">

<label>Kode Barang</label>
<input type="text" name="kode_barang" required><br>

<label>Nama Barang</label>
<input type="text" name="nama_barang" required><br>

<label>Harga</label>
<input type="number" name="harga" required><br>

<label>Stok</label>
<input type="number" name="stok" required><br>

<button type="submit" class="btn btn-simpan">Simpan</button>
<a href="supplier_detail.php?id=<?= htmlspecialchars($supplier_id) ?>" class="btn btn-batal">Batal</a>
</form>

</body>
</html>