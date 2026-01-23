<?php
include 'config.php';

$id = $_POST['id'];
$supplier_id = $_POST['supplier_id'];
$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($conn, "UPDATE barang SET
    kode_barang='$kode',
    nama_barang='$nama',
    harga='$harga',
    stok='$stok'
    WHERE id='$id'");

header("Location: supplier_detail.php?id=$supplier_id");
?>