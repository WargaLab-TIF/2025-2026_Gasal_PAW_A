<?php
include "../conn.php";

$query = "SELECT b.*, s.nama as nama_supplier FROM barang as b JOIN supplier as s ON b.supplier_id = s.id";
$ex = mysqli_query($conn, $query);
$result = mysqli_fetch_all($ex, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Master Barang</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    /* Sedikit style tambahan agar mirip dengan gambar */
    body {
      background-color: #f8f9fa; /* Latar belakang abu-abu muda */
    }
    .container {
      background-color: #ffffff; /* Kotak putih */
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      margin-top: 2rem;
    }
  </style>
</head>

<body>

  <div class="container">
    
    <h2 class="mb-4">Data Master Barang</h2>

    <div class="mb-3">
      <a href="form_barang.php" class="btn btn-success">Tambah Barang</a>
    </div>

    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr align="center">
          <th>ID</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Nama Supplier</th>
          <th>Tindakan</th> </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $v) { ?>
          <tr align="center">
            <td><?= $v['id']; ?></td>
            <td><?= $v['kode_barang']; ?></td>
            <td><?= $v['nama_barang']; ?></td>
            <td><?= number_format($v['harga']); ?></td> <td><?= $v['stok']; ?></td>
            <td><?= $v['nama_supplier']; ?></td>
            
            <td>
              <a href="hapus_barang.php?id=<?= $v['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>