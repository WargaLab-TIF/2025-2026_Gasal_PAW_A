CREATE DATABASE tp6_sulton;
USE tp6_sulton;
CREATE TABLE nota (
  id_nota INT AUTO_INCREMENT PRIMARY KEY,
  tanggal DATE NOT NULL,
  pelanggan VARCHAR(100) NOT NULL,
  total DECIMAL(10,2) DEFAULT 0
);
CREATE TABLE detail_barang (
  id_detail INT AUTO_INCREMENT PRIMARY KEY,
  id_nota INT NOT NULL,
  kode_barang VARCHAR(50),
  nama_barang VARCHAR(100),
  jumlah INT,
  harga DECIMAL(10,2),
  subtotal DECIMAL(10,2),
  FOREIGN KEY (id_nota) REFERENCES nota(id_nota) ON DELETE CASCADE
);
