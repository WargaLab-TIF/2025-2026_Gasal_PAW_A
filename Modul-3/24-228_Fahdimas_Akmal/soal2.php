<?php
// Array dari langkah sebelumnya
$fruits = array("Avocado", "Blueberry", "Cherry", "Dragonfruit", "Elderberry", "Fig", "Grape", "Honeydew");

// Menghapus satu data tertentu (misal: "Blueberry" di indeks 1)
unset($fruits[1]);

// Menghitung jumlah elemen total
$total_elements = count($fruits);

// Mendapatkan semua kunci (indeks) dari array
$keys = array_keys($fruits);

// Indeks tertinggi adalah kunci terakhir
$last_index = end($keys);

// Mengambil nilai dengan indeks tertinggi
$last_value = $fruits[$last_index];

echo "Setelah 'Blueberry' dihapus, nilai dengan indeks tertinggi adalah: " . $last_value . "<br>";
echo "Indeks tertinggi dari array \$fruits sekarang adalah: " . $last_index;
?>