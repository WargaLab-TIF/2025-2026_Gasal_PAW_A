<?php
require 'koneksi.php';

// SUPPLIER
mysqli_query($conn, "INSERT INTO supplier (nama_supplier, alamat, telepon) VALUES
('PT Sumber Rejeki', 'Jakarta', '081234567890'),
('CV Maju Jaya', 'Bandung', '081223344556'),
('UD Sentosa', 'Surabaya', '081345678901'),
('PT Mandiri Abadi', 'Yogyakarta', '081233344455'),
('CV Berkah Niaga', 'Malang', '081266778899')");

// BARANG
mysqli_query($conn, "INSERT INTO barang (nama_barang, harga, stok, supplier_id) VALUES
('Sabun Mandi', 3500, 100, 1),
('Shampoo', 12000, 80, 1),
('Sikat Gigi', 5000, 70, 2),
('Pasta Gigi', 8000, 90, 2),
('Tisu', 6000, 50, 3),
('Detergen', 15000, 60, 3),
('Minyak Goreng', 17000, 40, 4),
('Beras 5kg', 65000, 20, 4),
('Gula Pasir', 16000, 35, 5),
('Kopi Bubuk', 25000, 25, 5)");

// PEGAWAI
mysqli_query($conn, "INSERT INTO pegawai (nama_pegawai, jabatan) VALUES
('Rani', 'Kasir'),
('Andi', 'Kasir'),
('Tono', 'Admin')");

// PELANGGAN
mysqli_query($conn, "INSERT INTO pelanggan (nama_pelanggan, alamat, telepon) VALUES
('Budi', 'Jakarta', '0898374828'),
('Ani', 'Bandung', '0817827389'),
('Citra', 'Yogyakarta', '087906242'),
('Deni', 'Malang', '08182738245'),
('Eka', 'Surabaya', '081997836')");

echo "Data awal berhasil dimasukkan.";
?>
