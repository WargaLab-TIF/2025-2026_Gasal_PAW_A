<?php
$students = array("Andi" => 85, "Budi" => 90, "Citra" => 78, "Dewi" => 88);

echo "<b>Data nilai siswa:</b><br>";
foreach ($students as $nama => $nilai) {
    echo "$nama : $nilai<br>";
}

$cari = 88;
$hasil = array_search($cari, $students);

echo "<br><b>Mencari nilai $cari :</b><br>";
if ($hasil !== false) {
    echo "Nilai $cari dimiliki oleh <b>$hasil</b>";
} else {
    echo "Nilai $cari tidak ditemukan dalam array.";
}
?>
