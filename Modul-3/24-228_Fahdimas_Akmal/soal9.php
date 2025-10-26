<?php
// Array awal
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

// Menambahkan lima data baru
$height['David'] = "180";
$height['Ethan'] = "172";
$height['Frank'] = "168";
$height['George'] = "175";
$height['Harry'] = "182";

// Skrip perulangan foreach untuk menampilkan array
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>