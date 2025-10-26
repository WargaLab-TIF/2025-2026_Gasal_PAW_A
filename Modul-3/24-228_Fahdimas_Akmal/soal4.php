<?php
// Array awal
$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan lima data baru (bisa juga pakai loop, tapi ini lebih ringkas)
$new_fruits = ["Dragonfruit", "Elderberry", "Fig", "Grape", "Honeymelon"];
$fruits = array_merge($fruits, $new_fruits);

//------------------------------------------------//
// Bagian inilah yang menjadi fokus pertanyaan:
// Skrip perulangan FOR untuk menampilkan array
//------------------------------------------------//
$arrlength = count($fruits); // Kuncinya ada di sini!

echo "Data dalam array \$fruits:<br>";
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<br>Panjang array \$fruits saat ini adalah: " . $arrlength;
?>