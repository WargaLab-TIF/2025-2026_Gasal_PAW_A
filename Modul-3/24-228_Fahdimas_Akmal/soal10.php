<?php
// 1. Membuat array baru dengan nama $weight
$weight = array("Andy"=>"68", "Barry"=>"60", "Charlie"=>"65");

// 2. Menampilkan seluruh data menggunakan struktur perulangan foreach
echo "Data dalam array \$weight:<br>";
foreach($weight as $nama => $berat) {
    echo "Nama=" . $nama . ", Berat=" . $berat . " kg";
    echo "<br>";
}
?>