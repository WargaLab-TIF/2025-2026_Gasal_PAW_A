<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tugas_Pendahuluan_6";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "
-- 1. Data User (10 Data)
INSERT INTO user (username, password, nama, level) VALUES
('admin', 'admin123', 'Agus Santoso', 'admin'),
('kasir1', 'kasir123', 'Budi Hartono', 'kasir'),
('kasir2', 'kasir123', 'Citra Dewi', 'kasir'),
('gudang1', 'gudang123', 'Dodi Firmansyah', 'gudang'),
('manager', 'manager123', 'Eko Prasetyo', 'manager'),
('owner', 'owner123', 'Fajar Nugroho', 'owner'),
('kasir3', 'kasir123', 'Gita Gutawa', 'kasir'),
('admin2', 'admin123', 'Heri Setiawan', 'admin'),
('spv_kasir', 'spv123', 'Indah Permatasari', 'supervisor'),
('staff_it', 'it123', 'Joko Susilo', 'it_support');

-- 2. Data Pelanggan (10 Data)
INSERT INTO pelanggan (nama, telp, alamat) VALUES
('Ani Suryani', '081234567890', 'Jl. Merdeka No. 10, Surabaya'),
('Bambang Pamungkas', '081234567891', 'Jl. Jend. Sudirman No. 5, Jakarta'),
('Cici Paramida', '081234567892', 'Jl. Ahmad Yani No. 20, Bandung'),
('Dedi Corbuzier', '081234567893', 'Jl. Gajah Mada No. 3, Semarang'),
('Erni Jaya', '081234567894', 'Jl. Diponegoro No. 15, Yogyakarta'),
('Feri Irawan', '081234567895', 'Jl. Pahlawan No. 8, Malang'),
('Gina S. Noer', '081234567896', 'Jl. Veteran No. 2, Denpasar'),
('Hadi Suwarno', '081234567897', 'Jl. Pemuda No. 12, Medan'),
('Ika Kartika', '081234567898', 'Jl. Raden Saleh No. 7, Makassar'),
('Joni Iskandar', '081234567899', 'Jl. Kartini No. 1, Palembang');

-- 3. Data Supplier (10 Data)
INSERT INTO supplier (nama, telp, alamat) VALUES
('PT. Maju Mundur', '021-5551234', 'Kawasan Industri Pulogadung, JKT'),
('CV. Sejahtera Abadi', '031-8765432', 'Rungkut Industri, SBY'),
('UD. Tani Makmur', '0341-1234567', 'Jl. Raya Batu, Malang'),
('PT. Elektronik Jaya', '022-9876543', 'Jl. Soekarno Hatta, BDG'),
('CV. Pangan Sehat', '024-7654321', 'Kawasan Candi, Semarang'),
('PT. Tekstil Nusantara', '0271-5556667', 'Jl. Slamet Riyadi, Solo'),
('UD. Bangunan Kokoh', '0361-4443332', 'By Pass Ngurah Rai, Bali'),
('PT. Kimia Farma Tbk', '021-3332221', 'Jl. Veteran, Jakarta Pusat'),
('CV. Grafika Prima', '0274-8889990', 'Jl. Kaliurang KM 5, Jogja'),
('PT. Otomotif Perkasa', '021-4567890', 'Sunter, Jakarta Utara');

-- 4. Data Kategori (5 Data - Cukup untuk pengelompokan)
INSERT INTO kategori (nama_kategori) VALUES
('Elektronik'),
('Makanan & Minuman'),
('Pakaian'),
('Bahan Bangunan'),
('Alat Tulis Kantor');

-- 5. Data Barang (10 Data - Dihubungkan ke Kategori & Supplier)
INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id, kategori_id) VALUES
('ELK-001', 'Laptop Acer Aspire', 7500000, 10, 4, 1),
('ELK-002', 'Mouse Wireless Logitech', 150000, 50, 4, 1),
('MKN-001', 'Indomie Goreng (Dus)', 115000, 100, 5, 2),
('MKN-002', 'Aqua Galon 19L', 20000, 200, 2, 2),
('PAK-001', 'Kaos Polos Combed 30s', 45000, 500, 6, 3),
('PAK-002', 'Celana Jeans Levi\'s KW', 120000, 150, 6, 3),
('BGN-001', 'Semen Gresik 40kg', 55000, 80, 7, 4),
('BGN-002', 'Cat Tembok Dulux 5kg', 150000, 40, 7, 4),
('ATK-001', 'Kertas HVS A4 Sidu (Rim)', 45000, 300, 9, 5),
('ATK-002', 'Bolpen Standard AE7 (Pak)', 15000, 250, 9, 5);

-- 6. Data Nota (3 Contoh Transaksi Awal)
INSERT INTO nota (no_nota, tanggal, pelanggan_id, total_transaksi) VALUES
('PJ-20231027-001', '2023-10-27', 1, 7650000),
('PJ-20231028-001', '2023-10-28', 5, 230000),
('PJ-20231029-001', '2023-10-29', 8, 150000);

-- 7. Data Nota Detail (Rincian untuk 3 Nota di atas)
INSERT INTO nota_detail (nota_id, barang_id, harga_jual, qty, subtotal) VALUES
(1, 1, 7500000, 1, 7500000), -- Nota 1 beli Laptop
(1, 2, 150000, 1, 150000),   -- Nota 1 beli Mouse
(2, 3, 115000, 2, 230000),   -- Nota 2 beli Indomie 2 dus
(3, 8, 150000, 1, 150000);   -- Nota 3 beli Cat Tembok
";

if (mysqli_multi_query($conn, $sql)) {
    do { if ($res = mysqli_store_result($conn)) mysqli_free_result($res); } while (mysqli_more_results($conn) && mysqli_next_result($conn));
    echo "<h3>Data dummy LENGKAP (7 Tabel) berhasil dimasukkan!</h3>";
    echo "<p>Silakan buka <a href='transaksi_baru.php'>transaksi_baru.php</a> untuk mencoba aplikasi.</p>";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}
mysqli_close($conn);
?>