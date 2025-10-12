<?php
// Pertanyaan 3.2.1
// Menambahkan 5 data baru menggunakan perulangan FOR
// Menghitung panjang array setelah penambahan
// Menampilkan seluruh data dengan perulangan FOR yang dimodifikasi
$Lfruits = array("Semangka", "Pisang", "Nanas", "Anggur",
"Tomat");
echo "<strong>Menambahkan 5 data baru menggunakan perulangan
FOR:</strong><br>";
for($i = 0; $i < count($Lfruits); $i++) {
$fruits[] = $Lfruits[$i];
echo "Ditambahkan: " . $Lfruits[$i] . "<br>";
}
echo "<br>";
$new_arrlength = count($fruits);
echo "<strong>Panjang array \$fruits saat ini:</strong> " .
$new_arrlength . " elemen<br><br>";
echo "<strong>Menampilkan seluruh data array \$fruits dengan perulangan
FOR:</strong><br>";
for($x = 0; $x < $new_arrlength; $x++) {
echo "Indeks " . $x . ": " . $fruits[$x] . "<br>";
}
echo "<br>";

// Pertanyaan 3.2.2
// Membuat array baru $veggies
$Lveggies = array("Kangkung", "Wortel", "Cabai");
$veggies_length = count($Lveggies);
echo "<strong>Array baru \$veggies:</strong><br>";
for($x = 0; $x < $veggies_length; $x++) {
echo "Indeks " . $x . ": " . $Lveggies[$x] . "<br>";
}
echo "<br>";
?>