CREATE DATABASE IF NOT EXISTS modul7;
USE modul7;

CREATE TABLE IF NOT EXISTS penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    jumlah_pelanggan INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO penjualan (tanggal, total, jumlah_pelanggan) VALUES
('2023-09-01', 39000, 2),
('2023-09-02', 52000, 2),
('2023-09-03', 13000, 1),
('2023-09-04', 13000, 1),
('2023-09-05', 26000, 1),
('2023-09-06', 13000, 1),
('2023-09-09', 13000, 1);

