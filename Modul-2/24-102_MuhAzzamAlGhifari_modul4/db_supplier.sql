CREATE DATABASE db_supplier;

USE db_supplier;

CREATE TABLE supplier (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(100) NOT NULL
);


INSERT INTO supplier (nama, telp, alamat) VALUES
('PT. Maju Bersama', '08123456', 'Surabaya'),
('PT. Senang Sekali', '081515563', 'Bangkalan'),
('PT. Segar Segar', '0845454663', 'Surabaya');

