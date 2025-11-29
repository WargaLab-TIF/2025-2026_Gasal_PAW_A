<?php
// Array awal
$team = array("Budi", "Siti");

echo "Tim awal: <br>";
print_r($team);
echo "<hr>";

// Menambahkan beberapa anggota baru menggunakan array_push()
array_push($team, "Eko", "Wati");

echo "Tim setelah ditambah anggota baru: <br>";
print_r($team);
?>