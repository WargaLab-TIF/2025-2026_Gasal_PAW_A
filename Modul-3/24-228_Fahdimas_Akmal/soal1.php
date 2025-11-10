<?php

// Array awal
$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan lima data baru
$fruits[] = "Dragonfruit";
$fruits[] = "Elderberry";
$fruits[] = "Fig";
$fruits[] = "Grape";
$fruits[] = "Honeydew";

// Menghitung jumlah elemen untuk menemukan indeks tertinggi
$last_index = count($fruits) - 1;

// Mengambil nilai dengan indeks tertinggi
$last_value = $fruits[$last_index];

// Menampilkan hasilnya
echo "Nilai dengan indeks tertinggi adalah: " . $last_value . "<br>";
echo "Indeks tertinggi dari array \$fruits adalah: " . $last_index;
?>