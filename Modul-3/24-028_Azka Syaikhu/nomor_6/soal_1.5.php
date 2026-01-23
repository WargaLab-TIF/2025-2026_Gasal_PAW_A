<?php 
// array_filter()
$produk = [
    "Buku Tulis" => 15000,
    "Pensil 2B" => 5000,
    "Penghapus" => 3000,
    "Penggaris" => 7000,
    "Spidol" => 12000
];


$produk_murah = array_filter($produk, function($harga) {
    return $harga < 10000;
});

echo "Implementasi array_filter()" . "<br>";
print_r($produk_murah) ;


?>