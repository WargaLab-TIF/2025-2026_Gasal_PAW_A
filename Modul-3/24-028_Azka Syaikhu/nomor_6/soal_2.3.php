<?php
$nilai_mahasiswa = ['Budi' => 85, 'Citra' => 92, 'Dewi' => 78];
echo "Array Awal: ";
print_r($nilai_mahasiswa);

asort($nilai_mahasiswa);

echo "<br>Setelah di-asort(): ";
print_r($nilai_mahasiswa);
?>