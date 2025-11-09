<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "praktikumdatabase"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql_user = "
INSERT INTO user (username, password, level, nama) VALUES
('fathul', 'kasir1', 'kasir1', 'Fathul'),
('amin', 'kasir2', 'kasir2', 'Amin');
";
mysqli_query($conn, $sql_user);

$sql_pelanggan = "
INSERT INTO pelanggan (nama, telp, alamat) VALUES
('Amin', '081234567890', 'Surabaya'),
('Hadziq', '082256781234', 'Sidoarjo'),
('Salma', '083873456789', 'Bandung'),
('Rony', '084678923456', 'Malang'),
('Zhafran', '085123498765', 'Gresik');
";
mysqli_query($conn, $sql_pelanggan);

$sql_supplier = "
INSERT INTO supplier (nama, telp, alamat) VALUES
('CV. Sumber Rejeki Abadi', '081234567890', 'Surabaya'),
('PT. Mandiri Jaya Teknik', '085732211456', 'Bandung'),
('UD. Bumi Lancar Makmur', '087851234678', 'Pamekasan'),
('CV. Cahaya Utama', '081322445567', 'Sampang'),
('PT. Sidoarjo Maju Bersama', '085733221198', 'Sidoarjo');
";
mysqli_query($conn, $sql_supplier);

$sql_kategori = "
INSERT INTO kategori (nama_kategori) VALUES
('Handphone'),
('Laptop'),
('Aksesoris');
";
mysqli_query($conn, $sql_kategori);

$sql_barang = "
INSERT INTO barang (kode_barang, nama_barang, harga, stok, kategori_id, supplier_id) VALUES
-- HP
('HP001', 'Smartphone Samsung A14', 2500000, 35, 1, 1),
('HP002', 'iPhone 13', 12000000, 20, 1, 1),
('HP003', 'Xiaomi Redmi Note 12', 3000000, 25, 1, 1),

-- Laptop
('LP001', 'Laptop Lenovo i3', 6500000, 15, 2, 2),
('LP002', 'Laptop Asus VivoBook', 7500000, 10, 2, 2),
('LP003', 'Laptop Dell Inspiron', 8500000, 8, 2, 2),

-- Aksesoris
('AK001', 'Headset JBL T450', 450000, 40, 3, 3),
('AK002', 'Mouse Wireless Logitech', 150000, 50, 3, 3),
('AK003', 'Keyboard Mechanical Redragon', 350000, 30, 3, 3),
('AK004', 'Powerbank Xiaomi 10000mAh', 200000, 45, 3, 3);
";
mysqli_query($conn, $sql_barang);

$sql_nota = "
INSERT INTO nota (no_nota, tanggal, pelanggan_id, total_transaksi) VALUES
('LPT-20251109-001', '2025-11-09', 1, 14000000),
('HP-20251109-002', '2025-11-09', 2, 8000000),
('AKS-20251109-003', '2025-11-09', 3, 1400000);
";
mysqli_query($conn, $sql_nota);

$sql_detail = "
INSERT INTO nota_detail (nota_id, barang_id, harga_jual, qty, subtotal) VALUES
-- Nota Laptop
(1, 4, 6500000, 1, 6500000),
(1, 5, 7500000, 1, 7500000),

-- Nota HP
(2, 1, 2500000, 2, 5000000),
(2, 3, 3000000, 1, 3000000),

-- Nota Aksesoris
(3, 7, 450000, 2, 900000),
(3, 8, 150000, 1, 150000),
(3, 9, 350000, 1, 350000);
";
mysqli_query($conn, $sql_detail);

echo "<h3>semua data berhasil dimasukkan ke database praktikumdatabase !</h3>";

mysqli_close($conn);
?>
