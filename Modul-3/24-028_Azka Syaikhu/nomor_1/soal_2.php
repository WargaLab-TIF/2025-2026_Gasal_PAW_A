<?php 
$fruits = array("Avocado", "Blueberry", "Cherry");
unset($fruits[2]);
$index_tertinggi = count($fruits) ; 
$hasil = $index_tertinggi - 1;

echo "Nilai dengan indeks tertinggi adalah: $fruits[$hasil]  " . "<br>";
echo "I like " . $fruits[0] . ", " . $fruits[1] . " , " . "." . "<br>";
echo "Indeks tertinggi dari array adalah: " . $hasil;


?>