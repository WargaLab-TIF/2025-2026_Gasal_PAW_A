<?php 
include "header.php";
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Master Supplier</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <br>
  <div class="container">

  <div class="header">
    <h2>Data Master Supplier</h2>
    <br>
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
          <a href='supplier_detail.php?id={$d['id']}' class='btn btn-detail'>Lihat Barang</a>
          <a href='edit.php?id={$d['id']}' class='btn btn-edit'>Edit</a>
          <a href='proses_hapus.php?id={$d['id']}' class='btn btn-hapus' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
        </td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
    <h2>Data Pelanggan</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id ASC");
        while ($d = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>$no</td>
                <td>".htmlspecialchars($d['nama'])."</td>
                <td>".htmlspecialchars($d['telp'])."</td>
                <td>".htmlspecialchars($d['alamat'])."</td>
            </tr>
            ";
            $no++;
        }
        ?>
    </table>

    <h2>Data Barang & Stok</h2>

  <table>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Supplier</th>
    </tr>

    <?php
    $no = 1;

    $q = mysqli_query($conn, "
        SELECT b.*, s.nama AS supplier 
        FROM barang b 
        LEFT JOIN supplier s ON b.supplier_id = s.id
        ORDER BY b.id ASC
    ");

    while ($d = mysqli_fetch_assoc($q)) {
        echo "
        <tr>
            <td>$no</td>
            <td>{$d['kode_barang']}</td>
            <td>{$d['nama_barang']}</td>
            <td>Rp ".number_format($d['harga'],0,',','.')."</td>
            <td>{$d['stok']}</td>
            <td>{$d['supplier']}</td>
        </tr>
        ";
        $no++;
    }
    ?>
  </table>
</div>

</body>
</html>