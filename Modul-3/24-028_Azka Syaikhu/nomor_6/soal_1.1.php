<?php
// array_push()
$produk = [
    "Buku Tulis" => 15000,
    "Pensil Gambar" => 5000,
    "Penghapus" => 3000,
    "Penggaris" => 7000,
    "Spidol" => 12000
];

$produk["Tipe-X"] = 8000;
$produk["Bujur Sangkar"] = 6000;

echo "Implementasi array_push()";
print_r($produk);
?>