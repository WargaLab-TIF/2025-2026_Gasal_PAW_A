<?php
include 'config.php';

$supplier_id = $_POST['supplier_id'];
$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id)
            VALUES ('$kode','$nama','$harga','$stok','$supplier_id')");

header("Location: supplier_detail.php?id=$supplier_id");
?>