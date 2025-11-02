<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikumDatabase"; // 

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nama VARCHAR(100),
    jenis_kelamin CHAR(1),
    telp VARCHAR(20),
    alamat TEXT
);

CREATE TABLE supplier (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nama VARCHAR(100),
    telp VARCHAR(20),
    alamat TEXT
);

CREATE TABLE barang (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    kode_barang VARCHAR(20),
    nama_barang VARCHAR(100),
    harga INT,
    stok INT,
    supplier_id INT,
    FOREIGN KEY (supplier_id) REFERENCES supplier(id)
);

CREATE TABLE user (
    id_user INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    nama VARCHAR(100),
    alamat TEXT,
    hp VARCHAR(20),
    level VARCHAR(20)
);

CREATE TABLE transaksi (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    waktu_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    keterangan TEXT,
    total INT,
    pelanggan_id INT,
    FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id)
);

CREATE TABLE pembayaran (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    waktu_bayar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total INT,
    metode VARCHAR(20),
    transaksi_id INT,
    FOREIGN KEY (transaksi_id) REFERENCES transaksi(id)
);

CREATE TABLE transaksi_detail (
    transaksi_id INT NOT NULL,
    barang_id INT NOT NULL,
    harga INT,
    qty INT,
    PRIMARY KEY (transaksi_id, barang_id),
    FOREIGN KEY (transaksi_id) REFERENCES transaksi(id),
    FOREIGN KEY (barang_id) REFERENCES barang(id)
);
";

if (mysqli_multi_query($conn, $sql)) {

    do {
        if ($result = mysqli_store_result($conn)) {
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($conn));
    
    echo "Semua tabel berhasil dibuat di database praktikumDatabase";

} else {
    echo "Error creating tables: " . mysqli_error($conn);
}

mysqli_close($conn);
?>