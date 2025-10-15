<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like ". $fruits[0], ", " . $fruits[1]. " and ". $fruits[2]. ".";
echo "<br>";
echo "<br>";

// ==== Implementasi 1 ====
echo "Implementasi 1";
echo "<br>";
// Menambah 5 data baru 
array_push($fruits, "Mangga", "Anggur", "Leci", "Rambutan", "Durian");
print_r($fruits);
echo "<br>";
// Menampilkan nilai dari indeks tertinggi
$indeks_tertinggi = count($fruits) -1;
echo "Nilai dengan indeks tertinggi setelah ditambahkan 5: ". $fruits[$indeks_tertinggi];
echo "<br>";
// Menampilkan indeks tertinggi
echo "Indeks tertinggi dari array adalah : ". $indeks_tertinggi;
echo "<br>";
echo "<br>";

// ==== Implementasi 2 ====
echo "Implementasi 2";
echo "<br>";
// Menghapus data tertentu dari array
unset($fruits[4]);
$fruits = array_values($fruits); // merapikan mulai dari 0 setelah dihapus
print_r($fruits);
echo "<br>";
// Menampilkan nilai dari indeks tertinggi
$indeks_tertinggi = count($fruits) -1;
echo "Nilai dengan indeks tertinggi setelah dihapus: ". $fruits[$indeks_tertinggi];
echo "<br>";
// Menampilkan indeks tertinggi
echo "Indeks tertinggi dari array adalah : ". $indeks_tertinggi;
echo "<br>";
echo "<br>";

// ==== Implementasi 3 ====
echo "Implementasi 3";
echo "<br>";
// Membuat array baru dengan nama vegies di isi 3 buah data
$vegies = array("Wortel", "Kangkung", "Sawi");
// Menampilkan seluruh array vegies
print_r($vegies);
echo "<br>";
echo "<br>";
?>