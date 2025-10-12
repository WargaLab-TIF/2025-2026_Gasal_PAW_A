<?php 
// array_values()
$produk = [
    "Buku Tulis" => 15000,
    "Pensil 2B" => 5000,
    "Penghapus" => 3000,
];


$daftar_harga = array_values($produk);

echo "Implementasi array_values()" . "<br>";
print_r($daftar_harga);

?>