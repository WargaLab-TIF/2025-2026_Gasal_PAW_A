<?php 
//array_merge()
$produk_lama = [
    "Buku Tulis" => 15000,
    "Pensil Gambar" => 5000,
];

$produk_baru = [
    "Spidol" => 12000,
    "Penghapus" => 3000,
];

$semua_produk = array_merge($produk_lama, $produk_baru);

echo "Implementasi array_merge()" . "<br>";
print_r($semua_produk) ;

?>