<?php
// TUGAS PENGEMBANGAN (WAJIB)
echo "<h2>Tugas Pengembangan</h2>";

// SOAL 1 
// array produk & harga
$produk = array(
    array("Sate", 15000),
    array("Gule", 20000),
    array("Soto", 15000),
    array("Nasgor", 10000)
);

echo "<strong>Daftar Produk & Harga:</strong><br>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Produk</td><td>Harga (Rp)</td></tr>";
foreach ($produk as $item) {
    echo "<tr><td>" . $item[0] . "</td><td>" . number_format($item[1], 0, ',', '.') . "</td></tr>";
}
echo "</table>";


// SOAL 2
// hitung rata-rata nilai (contoh nilai mahasiswa)
echo "<p><strong>rata-rata mahasiswa:</strong></p>";
$nilaiMahasiswa = array(
    array("malik", 80, 85, 90),
    array("amelia", 75, 78, 80),
    array("maulana", 88, 90, 84)
);

$totalNilai = 0;
$jumlahData = 0;
foreach ($nilaiMahasiswa as $mhs) {
    $rata = ($mhs[1] + $mhs[2] + $mhs[3]) / 3;
    echo "<br>Rata-rata nilai " . $mhs[0] . " = " . number_format($rata, 2);
    $totalNilai += $rata;
    $jumlahData++;
}
$rataKelas = $totalNilai / $jumlahData;
echo "<p><strong>Rata-rata nilai seluruh mahasiswa = " . number_format($rataKelas, 2) . "</strong></p>";
?>