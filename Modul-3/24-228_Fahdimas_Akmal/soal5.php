<?php
// 1. Membuat array baru dengan nama $vegies
$vegies = array("Carrot", "Broccoli", "Spinach");

// 2. Menampilkan seluruh data menggunakan struktur perulangan FOR
echo "Data dalam array \$vegies:<br>";

$arrlength = count($vegies); // Mengambil panjang array $vegies
for($x = 0; $x < $arrlength; $x++) {
    echo $vegies[$x];
    echo "<br>";
}
?>