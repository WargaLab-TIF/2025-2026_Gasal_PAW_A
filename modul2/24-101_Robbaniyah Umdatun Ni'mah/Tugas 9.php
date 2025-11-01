<?php
$nilai = 85;

if ($nilai >= 85 && $nilai <= 100) {
    $grade = "A";
} elseif ($nilai >= 75 && $nilai < 85) {
    $grade = "B";
} elseif ($nilai >= 65 && $nilai < 75) {
    $grade = "C";
} elseif ($nilai >= 50 && $nilai < 65) {
    $grade = "D";
} else {
    $grade = "E";
}

echo "Nilai: $nilai <br>";
echo "Grade: $grade";
?>