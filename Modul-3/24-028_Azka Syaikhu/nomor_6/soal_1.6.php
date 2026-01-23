<?php
// Mengurutkan dari harga termurah

$produk = ["Buku Tulis" => 15000, "Pensil 2B" => 5000, "Penghapus" => 3000];
asort($produk);
echo "Urut Berdasarkan Harga Termurah (asort):". "<br>";
print_r($produk);
?>