<?php
session_start();
include 'conn.php';
include 'navbar.php';

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier_id'];

    $query = "INSERT INTO barang(kode_barang,nama_barang,harga,stok,supplier_id)
              VALUES('$kode','$nama','$harga','$stok','$supplier')";
    mysqli_query($conn,$query);

    echo "<script>alert('Data berhasil ditambah'); document.location='data_master.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="stylebarang.css">
</head>
<body>

<div class="container">
    <h2>Tambah Barang</h2>

    <form method="post">
        <table class="form-table">
            <tr>
                <td><label>Kode Barang</label></td>
                <td><input type="text" name="kode_barang" required></td>
            </tr>
            <tr>
                <td><label>Nama Barang</label></td>
                <td><input type="text" name="nama_barang" required></td>
            </tr>
            <tr>
                <td><label>Harga</label></td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td><label>Stok</label></td>
                <td><input type="number" name="stok" required></td>
            </tr>
            <tr>
                <td><label>ID Supplier</label></td>
                <td><input type="number" name="supplier_id" required></td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" name="simpan" class="btn-submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>

    <a href="data_master.php" class="btn-back">Kembali</a>
</div>

</body>
</html>

