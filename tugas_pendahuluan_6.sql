-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2025 pada 13.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_pendahuluan_6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `kategori_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `kategori_id`, `supplier_id`) VALUES
(1, 'ELK-001', 'Laptop Acer Aspire', 7500000, 10, 1, 4),
(2, 'ELK-002', 'Mouse Wireless Logitech', 150000, 50, 1, 4),
(3, 'MKN-001', 'Indomie Goreng (Dus)', 115000, 100, 2, 5),
(4, 'MKN-002', 'Aqua Galon 19L', 20000, 190, 2, 2),
(5, 'PAK-001', 'Kaos Polos Combed 30s', 45000, 500, 3, 6),
(6, 'PAK-002', 'Celana Jeans Levi\'s KW', 120000, 145, 3, 6),
(7, 'BGN-001', 'Semen Gresik 40kg', 55000, 80, 4, 7),
(8, 'BGN-002', 'Cat Tembok Dulux 5kg', 150000, 40, 4, 7),
(9, 'ATK-001', 'Kertas HVS A4 Sidu (Rim)', 45000, 300, 5, 9),
(10, 'ATK-002', 'Bolpen Standard AE7 (Pak)', 15000, 240, 5, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'Makanan & Minuman'),
(3, 'Pakaian'),
(4, 'Bahan Bangunan'),
(5, 'Alat Tulis Kantor'),
(6, 'Elektronik'),
(7, 'Makanan & Minuman'),
(8, 'Pakaian'),
(9, 'Bahan Bangunan'),
(10, 'Alat Tulis Kantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `total_transaksi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id`, `no_nota`, `tanggal`, `pelanggan_id`, `total_transaksi`) VALUES
(1, 'PJ-20231027-001', '2023-10-27', 1, 7650000),
(2, 'PJ-20231028-001', '2023-10-28', 5, 230000),
(3, 'PJ-20231029-001', '2023-10-29', 8, 150000),
(4, 'asistensi', '2025-11-21', 1, 200000),
(5, 'tes', '2025-11-24', 10, 0),
(6, 'INV/Dimas/Nov', '2025-11-24', 12, 750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_detail`
--

CREATE TABLE `nota_detail` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota_detail`
--

INSERT INTO `nota_detail` (`id`, `nota_id`, `barang_id`, `harga_jual`, `qty`, `subtotal`) VALUES
(1, 1, 1, 7500000, 1, 7500000),
(2, 1, 2, 150000, 1, 150000),
(3, 2, 3, 115000, 2, 230000),
(4, 3, 8, 150000, 1, 150000),
(5, 4, 4, 20000, 10, 200000),
(7, 6, 10, 15000, 10, 150000),
(8, 6, 6, 120000, 5, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'Ani Suryani', '081234567890', 'Jl. Merdeka No. 10, Surabaya'),
(2, 'Bambang Pamungkas', '081234567891', 'Jl. Jend. Sudirman No. 5, Jakarta'),
(3, 'Cici Paramida', '081234567892', 'Jl. Ahmad Yani No. 20, Bandung'),
(4, 'Dedi Corbuzier', '081234567893', 'Jl. Gajah Mada No. 3, Semarang'),
(5, 'Erni Jaya', '081234567894', 'Jl. Diponegoro No. 15, Yogyakarta'),
(6, 'Feri Irawan', '081234567895', 'Jl. Pahlawan No. 8, Malang'),
(7, 'Gina S. Noer', '081234567896', 'Jl. Veteran No. 2, Denpasar'),
(8, 'Hadi Suwarno', '081234567897', 'Jl. Pemuda No. 12, Medan'),
(9, 'Ika Kartika', '081234567898', 'Jl. Raden Saleh No. 7, Makassar'),
(10, 'Joni Iskandar', '081234567899', 'Jl. Kartini No. 1, Palembang'),
(11, 'Ani Suryani', '081234567890', 'Jl. Merdeka No. 10, Surabaya'),
(12, 'Bambang Pamungkas', '081234567891', 'Jl. Jend. Sudirman No. 5, Jakarta'),
(13, 'Cici Paramida', '081234567892', 'Jl. Ahmad Yani No. 20, Bandung'),
(14, 'Dedi Corbuzier', '081234567893', 'Jl. Gajah Mada No. 3, Semarang'),
(15, 'Erni Jaya', '081234567894', 'Jl. Diponegoro No. 15, Yogyakarta'),
(16, 'Feri Irawan', '081234567895', 'Jl. Pahlawan No. 8, Malang'),
(17, 'Gina S. Noer', '081234567896', 'Jl. Veteran No. 2, Denpasar'),
(18, 'Hadi Suwarno', '081234567897', 'Jl. Pemuda No. 12, Medan'),
(19, 'Ika Kartika', '081234567898', 'Jl. Raden Saleh No. 7, Makassar'),
(20, 'Joni Iskandar', '081234567899', 'Jl. Kartini No. 1, Palembang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(11) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 02:16:00', 12000000, 'EDC', 1),
(2, '2025-10-01 03:31:00', 220000, 'Tunai', 2),
(3, '2025-10-02 04:01:00', 1350000, 'Transfer', 3),
(4, '2025-10-02 07:21:00', 90000, 'Tunai', 4),
(5, '2025-10-03 09:06:00', 175000, 'EDC', 5),
(6, '2025-10-04 01:31:00', 500000, 'Transfer', 6),
(7, '2025-10-04 06:01:00', 240000, 'Tunai', 7),
(8, '2025-10-05 08:01:00', 1350000, 'EDC', 8),
(9, '2025-10-05 10:01:00', 220000, 'Tunai', 9),
(10, '2025-10-06 03:11:00', 195000, 'Tunai', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Maju Mundur', '021-5551234', 'Kawasan Industri Pulogadung, JKT'),
(2, 'CV. Sejahtera Abadi', '031-8765432', 'Rungkut Industri, SBY'),
(3, 'UD. Tani Makmur', '0341-1234567', 'Jl. Raya Batu, Malang'),
(4, 'PT. Elektronik Jaya', '022-9876543', 'Jl. Soekarno Hatta, BDG'),
(5, 'CV. Pangan Sehat', '024-7654321', 'Kawasan Candi, Semarang'),
(6, 'PT. Tekstil Nusantara', '0271-5556667', 'Jl. Slamet Riyadi, Solo'),
(7, 'UD. Bangunan Kokoh', '0361-4443332', 'By Pass Ngurah Rai, Bali'),
(8, 'PT. Kimia Farma Tbk', '021-3332221', 'Jl. Veteran, Jakarta Pusat'),
(9, 'CV. Grafika Prima', '0274-8889990', 'Jl. Kaliurang KM 5, Jogja'),
(10, 'PT. Otomotif Perkasa', '021-4567890', 'Sunter, Jakarta Utara'),
(13, 'PT. Maju Mundur', '021-5551234', 'Kawasan Industri Pulogadung, JKT'),
(14, 'CV. Sejahtera Abadi', '031-8765432', 'Rungkut Industri, SBY'),
(15, 'UD. Tani Makmur', '0341-1234567', 'Jl. Raya Batu, Malang'),
(16, 'PT. Elektronik Jaya', '022-9876543', 'Jl. Soekarno Hatta, BDG'),
(17, 'CV. Pangan Sehat', '024-7654321', 'Kawasan Candi, Semarang'),
(18, 'PT. Tekstil Nusantara', '0271-5556667', 'Jl. Slamet Riyadi, Solo'),
(19, 'UD. Bangunan Kokoh', '0361-4443332', 'By Pass Ngurah Rai, Bali'),
(20, 'PT. Kimia Farma Tbk', '021-3332221', 'Jl. Veteran, Jakarta Pusat'),
(21, 'CV. Grafika Prima', '0274-8889990', 'Jl. Kaliurang KM 5, Jogja'),
(22, 'PT. Otomotif Perkasa', '021-4567890', 'Sunter, Jakarta Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01 02:15:00', 'Pembelian laptop', 12000000, 1),
(2, '2025-10-01 03:30:00', 'Belanja bulanan', 220000, 2),
(3, '2025-10-02 04:00:00', 'Pembelian ATK', 1350000, 3),
(4, '2025-10-02 07:20:00', 'Beli beras dan kopi', 90000, 4),
(5, '2025-10-03 09:05:00', 'Beli bahan bangunan', 175000, 5),
(6, '2025-10-04 01:30:00', 'Pembelian 10 kaos', 500000, 6),
(7, '2025-10-04 06:00:00', 'Beli cat', 240000, 7),
(8, '2025-10-05 08:00:00', 'Beli aksesoris komputer', 1350000, 1),
(9, '2025-10-05 10:00:00', 'Belanja Indomie 2 kardus', 220000, 9),
(10, '2025-10-06 03:10:00', 'Beli 3 beras', 195000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 12000000, 1),
(2, 4, 110000, 2),
(3, 2, 750000, 1),
(3, 3, 600000, 1),
(4, 5, 25000, 1),
(4, 6, 65000, 1),
(5, 8, 55000, 1),
(5, 9, 120000, 0),
(5, 10, 75000, 1),
(6, 7, 50000, 10),
(7, 9, 120000, 2),
(8, 2, 750000, 1),
(8, 3, 600000, 1),
(9, 4, 110000, 2),
(10, 6, 65000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'Dimas', '12345', 'Fahdimas', 'admin'),
(2, 'Budi', '12345', 'Budi Hartono', 'user'),
(3, 'kasir2', 'kasir123', 'Citra Dewi', 'user'),
(4, 'gudang1', 'gudang123', 'Dodi Firmansyah', 'user'),
(5, 'manager', 'manager123', 'Eko Prasetyo', 'user'),
(6, 'owner', 'owner123', 'Fajar Nugroho', 'user'),
(7, 'kasir3', 'kasir123', 'Gita Gutawa', 'user'),
(8, 'admin2', 'admin123', 'Heri Setiawan', 'admin'),
(9, 'spv_kasir', 'spv123', 'Indah Permatasari', 'user'),
(10, 'staff_it', 'it123', 'Joko Susilo', 'user'),
(12, 'Dimsky', '827ccb0eea8a706c4c34a16891f84e7b', 'Fahdimas akmal', 'admin'),
(13, 'Cek', '87a4c6a2f3e9ec445bd66426446d9a3e', 'Dimas', 'admin'),
(14, '123', '87a4c6a2f3e9ec445bd66426446d9a3e', 'Fahdimas akmal', 'admin'),
(15, 'ddd', '7d49e40f4b3d8f68c19406a58303f826', 'sdsd', 'user'),
(18, 'admin', 'admin123', 'Agus Santoso', 'admin'),
(19, 'kasir1', 'kasir123', 'Budi Hartono', 'kasir'),
(20, 'kasir2', 'kasir123', 'Citra Dewi', 'kasir'),
(21, 'gudang1', 'gudang123', 'Dodi Firmansyah', 'gudang'),
(22, 'manager', 'manager123', 'Eko Prasetyo', 'manager'),
(23, 'owner', 'owner123', 'Fajar Nugroho', 'owner'),
(24, 'kasir3', 'kasir123', 'Gita Gutawa', 'kasir'),
(25, 'admin2', 'admin123', 'Heri Setiawan', 'admin'),
(26, 'spv_kasir', 'spv123', 'Indah Permatasari', 'supervisor'),
(27, 'staff_it', 'it123', 'Joko Susilo', 'it_support');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_nota` (`no_nota`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_id` (`nota_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD CONSTRAINT `nota_detail_ibfk_1` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nota_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
