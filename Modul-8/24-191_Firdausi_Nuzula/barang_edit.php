<?php
session_start();
include 'conn.php';
include 'navbar.php';

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier_id'];

    $update = "UPDATE barang SET 
        kode_barang='$kode',
        nama_barang='$nama',
        harga='$harga',
        stok='$stok',
        supplier_id='$supplier'
        WHERE id=$id";

    mysqli_query($conn, $update);

    echo "<script>alert('Data berhasil diupdate'); document.location='data_master.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylebarang.css">
</head>
<body>
    
<div class="container">
<h2>Edit Barang</h2>
<form method="post">
    <table class="form-table">
        <tr>
            <td><label>Kode Barang</label></td>
            <td><input type="text" name="kode_barang" value="<?= $data['kode_barang'] ?>" required></td>
        </tr>
        <tr>
            <td><label>Nama Barang</label></td>
            <td><input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required></td>
        </tr>
        <tr>
            <td><label>Harga</label></td>
            <td><input type="number" name="harga" value="<?= $data['harga'] ?>" required></td>
        </tr>
        <tr>
            <td><label>Stok</label></td>
            <td><input type="number" name="stok" value="<?= $data['stok'] ?>" required></td>
        </tr>
        <tr>
            <td><label>ID Supplier</label></td>
            <td><input type="number" name="supplier_id" value="<?= $data['supplier_id'] ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit" name="update" class="btn-submit">Update</button>
            </td>
        </tr>
        </div>
    </table>
</form>

<a href="data_master.php" class="btn-back">Kembali</a>

</body>
</html>
