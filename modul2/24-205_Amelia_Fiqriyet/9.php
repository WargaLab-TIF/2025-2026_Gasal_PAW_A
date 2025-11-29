<?php
$nilai = "";
$grade = "";

if (isset($_POST['nilai'])) {
    $nilai = (int) $_POST['nilai']; // pastikan jadi angka

    if ($nilai >= 85) {
        $grade = "A";
    } elseif ($nilai >= 75) {
        $grade = "B";
    } elseif ($nilai >= 65) {
        $grade = "C";
    } elseif ($nilai >= 55) {
        $grade = "D";
    } else {
        $grade = "E";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>
    <form method="post">
        <label for="nilai">Masukkan Nilai:</label>
        <input type="number" name="nilai" id="nilai" required>
        <button type="submit">Proses</button>
    </form>

    <?php if ($nilai !== ""): ?>
        <p>Nilai Anda: <?= $nilai; ?></p>
        <p>Grade: <b><?= $grade; ?></b></p>
    <?php endif; ?>
</body>
</html>
