<?php 
// array_search()
$produk = [
    "Buku Tulis" => 15000,
    "Pensil 2B" => 5000,
    "Penggaris" => 7000,
];

$nama_produk = array_search(7000, $produk);

echo "Implementasi array_search()" . "<br>";
echo "Produk dengan harga Rp 7.000 adalah: " . $nama_produk ;

?>