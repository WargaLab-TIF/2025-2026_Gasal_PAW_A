<?php
require 'koneksi.php';

// Membuat tabel SUPPLIER
$sql = "CREATE TABLE IF NOT EXISTS supplier (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_supplier VARCHAR(100),
    alamat VARCHAR(150),
    telepon VARCHAR(20)
)";
mysqli_query($conn, $sql);

// Membuat tabel BARANG
$sql = "CREATE TABLE IF NOT EXISTS barang (
    barang_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100),
    harga DECIMAL(10,2),
    stok INT,
    supplier_id INT,
    FOREIGN KEY (supplier_id) REFERENCES supplier(supplier_id)
)";
mysqli_query($conn, $sql);

// Membuat tabel PEGAWAI
$sql = "CREATE TABLE IF NOT EXISTS pegawai (
    pegawai_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pegawai VARCHAR(100),
    jabatan VARCHAR(50)
)";
mysqli_query($conn, $sql);

// Membuat tabel PELANGGAN
$sql = "CREATE TABLE IF NOT EXISTS pelanggan (
    pelanggan_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100),
    alamat VARCHAR(150),
    telepon VARCHAR(20)
)";
mysqli_query($conn, $sql);

// Membuat tabel TRANSAKSI (Master)
$sql = "CREATE TABLE IF NOT EXISTS transaksi (
    transaksi_id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE,
    pelanggan_id INT,
    pegawai_id INT,
    total DECIMAL(10,2),
    FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(pelanggan_id),
    FOREIGN KEY (pegawai_id) REFERENCES pegawai(pegawai_id)
)";
mysqli_query($conn, $sql);

// Membuat tabel TRANSAKSI_DETAIL (Detail)
$sql = "CREATE TABLE IF NOT EXISTS transaksi_detail (
    detail_id INT AUTO_INCREMENT PRIMARY KEY,
    transaksi_id INT,
    barang_id INT,
    jumlah INT,
    harga DECIMAL(10,2),
    subtotal DECIMAL(10,2),
    FOREIGN KEY (transaksi_id) REFERENCES transaksi(transaksi_id),
    FOREIGN KEY (barang_id) REFERENCES barang(barang_id)
)";
mysqli_query($conn, $sql);

echo "Semua tabel berhasil dibuat.";
?>
