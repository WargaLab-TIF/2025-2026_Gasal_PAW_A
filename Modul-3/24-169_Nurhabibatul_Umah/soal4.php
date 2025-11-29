<?php
$height = array("Andi" => "176", "Barry" => "165", "Charlie" => "178");
foreach ($height as $x => $x_value){
    echo "Key: " . $x . " value: " . $x_value;
    echo "<br>";
};
echo "<br>";

// ==== Implementasi 1 ====
echo "Implementasi 1";
echo "<br>";
// Menambah 5 data baru
$height["Indri"] = "152";
$height["Knaya"] = "174";
$height["Putri"] = "185";
$height["Indah"] = "165";
$height["Anggun"] = "170";
// Menampilkan seluruh data menggunakan for 
foreach ($height as $x => $x_value){
    echo "Key: " . $x . " value: " . $x_value;
    echo "<br>";
};
echo "<br>";

// ==== Implementasi 2 ====
echo "Implementasi 2";
echo "<br>";
// Membuat array baru diisi 3 buah data
$weight = array("Buku" => "20", "Kardus" => "80", "Papan" => "120");
// Menampilkan seluruh data dengan perulangan for (hanya modifikasi)
foreach ($weight as $x => $x_value){
    echo "Key: " . $x . " value: " . $x_value;
    echo "<br>";
};
echo "<br>";
?>