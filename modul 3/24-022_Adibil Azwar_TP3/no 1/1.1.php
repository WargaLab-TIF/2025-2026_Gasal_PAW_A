<?php 

$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "Mango", "Grape", "Lyche", "Coconut", "Banana");
$index_tertinggi = count($fruits) ; 
$hasil = $index_tertinggi - 1;

echo "Nilai dengan indeks tertinggi adalah: $fruits[$hasil] " .  "<br>";
echo "I like " . $fruits[0] . ", " . $fruits[1] . " , " . $fruits[2] . "." . "<br>";
echo "Indeks tertinggi dari array adalah: " . $hasil;
?>