<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

for ($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x];
    echo "<br>";
};
echo "<br>";

// ==== Implementasi 1 ====
echo "Implementasi 1";
echo "<br>";
// Menambahkan 5 data baru menggunakan FOR
for ($i = 0; $i < 5; $i++){
    $fruits[] = "data buah ke- " . ($i+1);
};
// Menampilkan panjang atau jumlah data pada array
echo "Panjang Array setelah di tambah 5 data baru: ". count($fruits);
echo "<br>";
// Menampilkan seluruh data dalam array menggunakan struktur perulangan 
$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x];
    echo "<br>";
};
echo "<br>";
echo "<br>";

// ==== Implementasi 2 ====
echo "Implementasi 2";
echo "<br>";
// Membuat array baru vegies di isi 3 buah data
$vegies = array("Wortel", "Kangkung", "Sawi");
// Menampilkan seluruh data dengan perulangan for (hanya modifikasi)
$arrlength = count($vegies);
for ($x = 0; $x < $arrlength; $x++){
    echo $vegies[$x];
    echo "<br>";
};
echo "<br>";
echo "<br>";
?>