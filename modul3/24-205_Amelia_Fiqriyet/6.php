<?php
// EKSPOLORASI FUNGSI-FUNGSI ARRAY
echo "<h2>Eksplorasi Fungsi pada Array</h2>";

$students = [
    array("malik", "24000173", "0812345624"),
    array("amelia", "24000174", "0845627811"),
];

// 1. array_push() – menambah data baru ke array
array_push($students, array("maulana", "24000175", "0812345700"));
echo "<p><b>Nomor 1:</b> Setelah array_push(), jumlah data sekarang = " . count($students) . "</p>";

// 2. array_merge() – menggabungkan dua array
$arrayBaru = [
    array("fifi", "24000205", "0812345711"),
    array("fira", "24000206", "0812345722")
];
$gabungan = array_merge($students, $arrayBaru);
echo "<p><b>Nomor 2:</b> Setelah array_merge(), jumlah data gabungan = " . count($gabungan) . "</p>";

// 3. array_values() – mengambil semua nilai dari array (tanpa kunci)
echo "<p><b>Nomor 3:</b> Contoh array_values() (baris pertama mahasiswa):<br>";
print_r(array_values($students[0]));
echo "</p>";

// 4. array_search() – mencari posisi nilai tertentu di dalam array
// Mencari NIM "24000173" di kolom ke-1 (kolom NIM)
$cari = array_search("24000173", array_column($gabungan, 1));
echo "<p><b>Nomor 4:</b> Hasil array_search('24000173') = indeks ke-" . $cari . "</p>";

// 5. array_filter() – memfilter data dengan kondisi tertentu
// Menyaring hanya mahasiswa dengan NIM > 24000173
$filter = array_filter($gabungan, function($mhs) {
    return $mhs[1] > "24000205";
});

echo "<p><b>Nomor 5:</b> Hasil array_filter() (hanya NIM > 24000205):<br>";
foreach ($filter as $mhs) {
    echo "NIM: " . $mhs[1] . "<br>"; // hanya tampilkan kolom NIM
}
echo "</p>";

// 6. Sorting pada array (a-z)
echo "<p><b>Nomor 6:</b> Implementasi Sorting pada Array (a-z):<br>";
$nama = ["malik", "amelia", "maulana", "fifi", "fira"];
sort($nama); // urutkan dari A ke Z
foreach ($nama as $n) {
    echo $n . "<br>";
}
echo "</p>";
?>
