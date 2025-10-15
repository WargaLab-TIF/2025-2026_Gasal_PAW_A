<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// SOAL 1
// nambah 5 data baru
$fruits[] = "Mango";
$fruits[] = "Banana";
$fruits[] = "Orange";
$fruits[] = "Apple";
$fruits[] = "Watermelon";

echo "isi array fruits: <br>";
print_r($fruits);
echo "<br> <br>";

// nilai dengan indeks tertinggi
$idxTertinggi = count($fruits) - 1;
echo "nilai dengan indeks tertinggi dari array fruits adalah: " . $fruits[$idxTertinggi] . "<br>";
echo "indeks tertinggi dari array fruits adalah: " . $idxTertinggi;
echo "<br> <br>";

// SOAL 2
// hapus data tertentu
unset($fruits[2]);
unset($fruits[6]);
$fruits = array_values($fruits); //agar indeks berurutan lagi setelah dihapus

echo "isi array fruits setelah menghapus data: <br>";
print_r($fruits);
echo "<br> <br>";

$idxTertinggiStlhDelete = count($fruits) - 1;
echo "nilai dengan indeks tertinggi dari array fruits adalah: " . $fruits[$idxTertinggiStlhDelete] . "<br>";
echo "indeks tertinggi dari array fruits adalah: " . $idxTertinggiStlhDelete;
echo "<br> <br>";

// SOAL 3
$vegies = array("carrot", "tomato", "Brocoli");

echo "isi array vegies: <br>";
print_r($vegies);
?>