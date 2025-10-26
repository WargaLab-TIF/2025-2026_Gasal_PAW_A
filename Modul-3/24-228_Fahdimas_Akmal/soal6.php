<?php
// Array awal
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

// Menambahkan lima data baru
$height['David'] = "180";
$height['Ethan'] = "172";
$height['Frank'] = "168";
$height['George'] = "175";
$height['Harry'] = "182"; // Ini data terakhir yang ditambahkan

// Mengambil nilai dari elemen terakhir dalam array
$last_value = end($height);

echo "Nilai dengan indeks terakhir dari array \$height adalah: " . $last_value;
?>