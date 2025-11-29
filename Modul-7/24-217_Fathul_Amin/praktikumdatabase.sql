-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2025 pada 12.41
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
-- Database: `praktikumdatabase`
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
(1, 'HP001', 'Smartphone Samsung A14', 2500000, 20, 1, 1),
(2, 'HP002', 'iPhone 13', 12000000, 0, 1, 1),
(3, 'HP003', 'Xiaomi Redmi Note 12', 3000000, 25, 1, 1),
(4, 'LP001', 'Laptop Lenovo i3', 6500000, 14, 2, 2),
(5, 'LP002', 'Laptop Asus VivoBook', 7500000, 4, 2, 2),
(6, 'LP003', 'Laptop Dell Inspiron', 8500000, 8, 2, 2),
(7, 'AK001', 'Headset JBL T450', 450000, 20, 3, 3),
(8, 'AK002', 'Mouse Wireless Logitech', 150000, 50, 3, 3),
(9, 'AK003', 'Keyboard Mechanical Redragon', 350000, 30, 3, 3),
(10, 'AK004', 'Powerbank Xiaomi 10000mAh', 200000, 45, 3, 3);

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
(1, 'Handphone'),
(2, 'Laptop'),
(3, 'Aksesoris');

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
(1, 'LPT-20251109-001', '2025-11-09', 1, 14000000),
(2, 'HP-20251109-002', '2025-11-09', 2, 8000000),
(3, 'AKS-20251109-003', '2025-11-09', 3, 1400000),
(4, 'HP-20251109-004', '2025-11-09', 4, 60000000),
(5, '1', '2025-11-14', 5, 0),
(6, 'HP-20251109-003', '2025-11-14', 4, 450000),
(7, 'HP-123', '2025-11-16', 2, 0),
(8, 'HP-321', '2025-11-16', 2, 180000000),
(9, 'HP-2', '2025-11-16', 1, 4050000),
(10, 'HP-5', '2025-11-16', 1, 0),
(11, 'HP-6', '2025-11-16', 1, 450000),
(12, 'hp-4', '2025-11-16', 2, 7500000),
(13, '7', '2025-11-16', 2, 4050000),
(14, 'hp-09', '2025-11-16', 4, 37500000),
(15, 'hp009', '2025-11-16', 2, 12500000),
(16, 'hp000', '2025-11-16', 1, 12500000),
(17, 'hp1', '2025-11-16', 1, 12500000);

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
(1, 1, 4, 6500000, 1, 6500000),
(2, 1, 5, 7500000, 1, 7500000),
(3, 2, 1, 2500000, 2, 5000000),
(4, 2, 3, 3000000, 1, 3000000),
(5, 3, 7, 450000, 2, 900000),
(6, 3, 8, 150000, 1, 150000),
(7, 3, 9, 350000, 1, 350000),
(8, 4, 2, 12000000, 5, 60000000),
(9, 6, 7, 450000, 1, 450000),
(10, 8, 2, 12000000, 10, 120000000),
(11, 8, 2, 12000000, 5, 60000000),
(12, 9, 7, 450000, 9, 4050000),
(13, 11, 7, 450000, 1, 450000),
(14, 12, 5, 7500000, 1, 7500000),
(15, 13, 7, 450000, 9, 4050000),
(18, 14, 5, 7500000, 5, 37500000),
(19, 15, 1, 2500000, 5, 12500000),
(20, 16, 1, 2500000, 5, 12500000),
(21, 17, 1, 2500000, 5, 12500000);

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
(1, 'Amin', '081234567890', 'Surabaya'),
(2, 'Hadziq', '082256781234', 'Sidoarjo'),
(3, 'Salma', '083873456789', 'Bandung'),
(4, 'Rony', '084678923456', 'Malang'),
(5, 'Zhafran', '085123498765', 'Gresik');

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
(1, '2025-11-01 02:20:00', 2800000, 'cash', 1),
(2, '2025-11-02 03:35:00', 12000000, 'transfer', 2),
(3, '2025-11-03 04:05:00', 450000, 'cash', 3),
(4, '2025-11-04 06:25:00', 6500000, 'transfer', 4),
(5, '2025-11-05 07:20:00', 200000, 'cash', 5),
(6, '2025-11-06 08:50:00', 6000000, 'cash', 6),
(7, '2025-11-07 09:40:00', 8500000, 'transfer', 7),
(8, '2025-11-08 10:15:00', 350000, 'cash', 8),
(9, '2025-11-09 11:25:00', 12450000, 'qris', 9),
(10, '2025-11-10 12:05:00', 450000, 'cash', 10);

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
(1, 'CV. Sumber Rejeki Abadi', '081234567891', 'Surabaya'),
(2, 'PT. Mandiri Jaya Teknik', '085732211456', 'Bandung'),
(3, 'UD. Bumi Lancar Makmur', '087851234678', 'Pamekasan'),
(4, 'CV. Cahaya Utama', '081322445567', 'Sampang'),
(5, 'PT. Sidoarjo Maju Bersama', '085733221198', 'Sidoarjo');

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
(1, '2025-11-01 02:10:00', 'Pembelian HP Samsung A14 & Mouse Logitech', 2800000, 1),
(2, '2025-11-02 03:30:00', 'Pembelian iPhone 13', 12000000, 2),
(3, '2025-11-03 04:00:00', 'Pembelian Headset JBL', 450000, 3),
(4, '2025-11-04 06:20:00', 'Pembelian Laptop Lenovo i3', 6500000, 4),
(5, '2025-11-05 07:15:00', 'Pembelian Powerbank Xiaomi', 200000, 5),
(6, '2025-11-06 08:40:00', 'Pembelian Xiaomi Redmi Note 12 (2 unit)', 6000000, 1),
(7, '2025-11-07 09:30:00', 'Pembelian Laptop Dell Inspiron', 8500000, 2),
(8, '2025-11-08 10:10:00', 'Pembelian Keyboard Mechanical', 350000, 3),
(9, '2025-11-09 11:20:00', 'Pembelian iPhone 13 & Headset JBL', 12450000, 4),
(10, '2025-11-10 12:00:00', 'Pembelian Mouse Logitech (3 unit)', 450000, 5);

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
(1, 1, 2500000, 1),
(1, 8, 150000, 2),
(2, 2, 12000000, 1),
(3, 7, 450000, 1),
(4, 4, 6500000, 1),
(5, 10, 200000, 1),
(6, 3, 3000000, 2),
(7, 6, 8500000, 1),
(8, 9, 350000, 1),
(9, 2, 12000000, 1),
(9, 7, 450000, 1),
(10, 8, 150000, 3);

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
(1, 'fathul', 'kasir1', 'Fathul', 'kasir1'),
(2, 'amin', 'kasir2', 'Amin', 'kasir2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
