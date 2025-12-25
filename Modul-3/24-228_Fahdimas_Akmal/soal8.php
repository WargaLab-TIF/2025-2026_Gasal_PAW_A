<?php
// Membuat array baru dengan nama $weight
$weight = array("Andy"=>"68", "Barry"=>"60", "Charlie"=>"65");

// Untuk mengambil data kedua, kita ambil dulu semua kuncinya
$keys = array_keys($weight);

// Kunci kedua ada di indeks 1 ($keys[1]), yaitu "Barry"
$second_key = $keys[1];

// Tampilkan nilai dari kunci kedua
$second_value = $weight[$second_key];

echo "Data kedua dari array \$weight (Barry) adalah: " . $second_value . " kg";
?>