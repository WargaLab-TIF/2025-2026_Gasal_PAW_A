<?php
// Array dari langkah sebelumnya
$height = array(
    "Andy"=>"176", 
    "Barry"=>"165", 
    "Charlie"=>"170",
    "David"=>"180",
    "Ethan"=>"172",
    "Frank"=>"168",
    "George"=>"175",
    "Harry"=>"182"
);

// Menghapus satu data tertentu
unset($height['Barry']);

// Mengambil nilai dari elemen terakhir (tetap sama)
$last_value = end($height);

echo "Setelah data 'Barry' dihapus, nilai dengan indeks terakhir adalah: " . $last_value;
?>