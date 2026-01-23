<!DOCTYPE html>
<html>
<head>
    <title>soal 9</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>
    <form method="post">
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required></td>
            </tr>
            <tr>
                <td>Mata Kuliah</td>
                <td><input type="text" name="matakuliah" required></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai" min="0" max="100" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Proses">
                </td>
            </tr>
        </table>
    </form>

    <?php
    $nama       = $_POST['nama'] ?? '';
    $nim        = $_POST['nim'] ?? '';
    $matakuliah = $_POST['matakuliah'] ?? '';
    $nilai      = isset($_POST['nilai']) ? (int)$_POST['nilai'] : null;

    if ($nama && $nim && $matakuliah && $nilai !== null) {
        if ($nilai >= 85) {
            $grade = "A";
        } elseif ($nilai >= 70) {
            $grade = "B";
        } elseif ($nilai >= 55) {
            $grade = "C";
        } elseif ($nilai >= 40) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h3>Hasil Penilaian</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Nama</th><th>NIM</th><th>Mata Kuliah</th><th>Nilai</th><th>Grade</th></tr>";
        echo "<tr>";
        echo "<td>$nama</td>";
        echo "<td>$nim</td>";
        echo "<td>$matakuliah</td>";
        echo "<td>$nilai</td>";
        echo "<td>$grade</td>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
