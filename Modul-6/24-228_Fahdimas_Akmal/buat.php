<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) { die("Koneksi Gagal: " . mysqli_connect_error()); }

// Reset Database
mysqli_query($conn, "DROP DATABASE IF EXISTS Tugas_Pendahuluan_6");
if (mysqli_query($conn, "CREATE DATABASE Tugas_Pendahuluan_6")) {
    echo "Database berhasil dibuat ulang (Versi 7 Tabel).<br>";
} else {
    die("Gagal buat database: " . mysqli_error($conn));
}
mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, "Tugas_Pendahuluan_6");
if (!$conn) { die("Koneksi Database Baru Gagal: " . mysqli_connect_error()); }

$sql = "
-- 1. Tabel User
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100),
    level VARCHAR(20) -- misal: admin, kasir
);

-- 2. Tabel Pelanggan
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20),
    alamat TEXT
);

-- 3. Tabel Supplier
CREATE TABLE supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20),
    alamat TEXT
);

-- 4. Tabel Kategori (TABEL BARU KE-7)
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL
);

-- 5. Tabel Barang (Terhubung ke Kategori & Supplier)
CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20) UNIQUE,
    nama_barang VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT DEFAULT 0,
    kategori_id INT,
    supplier_id INT,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE SET NULL,
    FOREIGN KEY (supplier_id) REFERENCES supplier(id) ON DELETE SET NULL
);

-- 6. Tabel Nota (Header Transaksi Penjualan)
CREATE TABLE nota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_nota VARCHAR(50) UNIQUE,
    tanggal DATE NOT NULL,
    pelanggan_id INT,
    total_transaksi INT DEFAULT 0, -- Opsional: untuk menyimpan total langsung
    FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id) ON DELETE SET NULL
);

-- 7. Tabel Nota Detail (Rincian Barang per Nota)
CREATE TABLE nota_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nota_id INT NOT NULL,
    barang_id INT NOT NULL,
    harga_jual INT NOT NULL,
    qty INT NOT NULL,
    subtotal INT NOT NULL, -- Opsional: biar mudah hitung
    FOREIGN KEY (nota_id) REFERENCES nota(id) ON DELETE CASCADE,
    FOREIGN KEY (barang_id) REFERENCES barang(id)
);
";

if (mysqli_multi_query($conn, $sql)) {
    do { if ($res = mysqli_store_result($conn)) mysqli_free_result($res); } while (mysqli_more_results($conn) && mysqli_next_result($conn));
    echo "<h3>SUKSES! Database sekarang punya pas 7 Tabel.</h3>";
} else {
    echo "Error SQL: " . mysqli_error($conn);
}
mysqli_close($conn);
?>