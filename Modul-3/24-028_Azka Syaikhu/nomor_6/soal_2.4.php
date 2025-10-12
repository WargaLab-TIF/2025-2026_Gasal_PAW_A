<?php
$nilai_mahasiswa = ['Budi' => 85, 'Citra' => 92, 'Dewi' => 78];
echo "Array Awal: ";
print_r($nilai_mahasiswa);

arsort($nilai_mahasiswa);

echo "<br>Setelah di-arsort(): ";
print_r($nilai_mahasiswa);
?>