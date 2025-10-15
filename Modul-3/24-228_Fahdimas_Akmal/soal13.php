<?php
// Dua kelompok terpisah
$programmers = array("Andi", "Beni");
$designers = array("Cindy", "Dina");

// Menggabungkan kedua kelompok menjadi satu tim proyek
$project_team = array_merge($programmers, $designers);

echo "Tim Proyek Gabungan: <br>";
print_r($project_team);
?>
