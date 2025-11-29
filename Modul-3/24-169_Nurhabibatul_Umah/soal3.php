<?php
$height = array("Andi" => "176", "Barry" => "165", "Charlie" => "178");
echo "Andi is ". $height['Andi']. " cm tall.";
echo "<br>";
echo "<br>";

// ==== Implementasi 1 ====
echo "Implementasi 1";
echo "<br>";
// Menambah 5 data baru dalam array
$height["Habiba"] = "152";
$height["Assauqi"] = "174";
$height["Afriza"] = "185";
$height["Fania"] = "165";
$height["Gessya"] = "170";
print_r($height);
echo "<br>";
// Menampilkan nilai dengan indeks terakhir
$keys = array_keys($height);
$indeks_terakhir = end($keys);
echo "Nilai dengan indeks terakhir setelah ditambahkan 5: ". $height[$indeks_terakhir];
echo "<br>";
echo "<br>";

// ==== Implementasi 2 ====
echo "Implementasi 2";
echo "<br>";
// Menghapus satu data tertentu dari array
unset($height['Afriza']);
print_r($height);
echo "<br>";
// Menampilkan nilai dengan indeks terakhir
$keys = array_keys($height);
$indeks_terakhir = end($keys);
echo "Nilai dengan indeks terakhir setelah dihapus: ". $height[$indeks_terakhir];
echo "<br>";
echo "<br>";

// ==== Implementasi 3 ====
echo "Implementasi 3";
echo "<br>";
// Membuat array baru di isi 3 buah data
$weight = array("Andin" => "50", "Inezz" => "67", "Gita" => "70");
// Menampilkan data kedua dari array
echo $weight["Inezz"];
echo "<br>";
echo "<br>";
?>