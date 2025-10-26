<?php
// Fungsi untuk kriteria filter (hanya nilai di atas 80)
function is_passed($score) {
    return $score >= 80;
}

$all_scores = array(75, 90, 82, 65, 88);

// Menyaring nilai yang memenuhi kriteria "lulus"
$passed_scores = array_filter($all_scores, "is_passed");

echo "Siswa yang lulus (nilai >= 80): <br>";
print_r($passed_scores);
?>
