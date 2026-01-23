<?php
$students = array("Andi" => 85, "Budi" => 90, "Citra" => 78);

echo "<b>Array asosiatif awal:</b><br>";
print_r($students);
echo "<br><br>";

$nilai = array_values($students);

echo "<b>Hasil array setelah menggunakan array_values():</b><br>";
print_r($nilai);
echo "<br><br>";

echo "<b>Menampilkan nilai satu per satu:</b><br>";
foreach ($nilai as $n) {
    echo $n . "<br>";
}
?>
