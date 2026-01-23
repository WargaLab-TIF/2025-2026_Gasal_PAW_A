<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Master Supplier</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>
  </div>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Telp</th>
      <th>Alamat</th>
      <th>Tindakan</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");
    while ($d = mysqli_fetch_assoc($data)) {
      echo "
      <tr>
        <td>$no</td>
        <td>{$d['nama']}</td>
        <td>{$d['telp']}</td>
        <td>{$d['alamat']}</td>
        <td class='aksi'>
          <a href='edit.php?id={$d['id']}' class='btn btn-edit'>Edit</a>
          <a href='proses_hapus.php?id={$d['id']}' class='btn btn-hapus' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
        </td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
</body>
</html>
