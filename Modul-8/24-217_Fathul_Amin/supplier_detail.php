<?php
include 'config.php';
$id = ($_GET['id'] ?? 0);

$s = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$supplier = mysqli_fetch_assoc($s);

$barang = mysqli_query($conn, "SELECT * FROM barang WHERE supplier_id=$id");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Detail Supplier</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Detail Supplier</h2>

<?php if(!$supplier) { echo "<p>Supplier tidak ditemukan.</p><a href='index.php' class='btn btn-batal'>Kembali</a>"; exit; } ?>

<table class="supplier-table" border="1" cellpadding="6">
    <tr>
        <td>Nama</td>
        <td><?= $supplier['nama'] ?></td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td><?= $supplier['telp'] ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?= $supplier['alamat'] ?></td>
    </tr>
</table>


<hr>

<div class="header-detail">
    <h3>Daftar Barang</h3>
    <br>
    <a href="tambah_barang.php?supplier_id=<?= $id ?>" class="btn btn-tambah">+ Tambah Barang</a>
</div>


<table>
  <tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
  </tr>

<?php
$no=1;
while($d = mysqli_fetch_assoc($barang)) {
?>
<tr>
  <td><?= $no++; ?></td>
  <td><?= htmlspecialchars($d['kode_barang']) ?></td>
  <td><?= htmlspecialchars($d['nama_barang']) ?></td>
  <td><?= htmlspecialchars($d['harga']) ?></td>
  <td><?= htmlspecialchars($d['stok']) ?></td>
  <td class="aksi">
    <a href="edit_barang.php?id=<?= $d['id'] ?>" class="btn btn-edit">Edit</a>
    <a href="hapus_barang.php?id=<?= $d['id'] ?>&supplier_id=<?= $id ?>" onclick="return confirm('Yakin?')" class="btn btn-hapus">Hapus</a>
  </td>
</tr>
<?php } ?>
</table>

<br>
<a href="data_master.php" class="btn btn-batal">Kembali</a>

</body>
</html>
