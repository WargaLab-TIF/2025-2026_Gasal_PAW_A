<?php
$student_scores = array(
    array("Andi", 85),
    array("Beni", 90),
    array("Chika", 78),
);

function calculate_average($scores_array) {
    $total_score = 0;
    $total_students = count($scores_array);

    if ($total_students == 0) {
        return 0;
    }
    
    foreach ($scores_array as $student) {
        $total_score += $student[1];
    }

    return $total_score / $total_students;
}

$average_score = calculate_average($student_scores);

echo "<b>Rata-rata nilai mahasiswa adalah: " . number_format($average_score, 2) . "</b>";
?>
