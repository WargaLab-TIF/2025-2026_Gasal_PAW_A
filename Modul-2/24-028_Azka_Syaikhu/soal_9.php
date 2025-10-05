<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 9</title>
</head>
<body>
        <h2>Form Input Nilai Mahasiswa</h2>
        <form action="" method="GET">
            <table>
                <tr>
                    <td><label for="nama">Nama :</label></td>
                    <td><input type="text" id="nama" name="nama" required placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td><label for="kelas">Kelas :</label></td>
                    <td><input type="text" id="kelas" name="kelas" required placeholder="Masukkan Kelas"></td>
                </tr>
                <tr>
                    <td><label for="matkul">Mata Kuliah :</label></td>
                    <td><input type="text" id="matkul" name="matkul" required placeholder="Masukkan Mata Kuliah"></td>
                </tr>
                <tr>
                    <td><label for="nilai">Nilai :</label></td>
                    <td><input type="number" id="nilai" name="nilai" min="0" max="100" required placeholder="0-100"></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit">Submit</button></td>
                </tr>
            </table>
        </form>

    <?php
    if (isset($_GET['nama']) && isset($_GET['nilai'])) {

        $kelas = ($_GET['kelas']);
        $nama = ($_GET['nama']);
        $matkul = ($_GET['matkul']);
        $nilai = (int)$_GET['nilai'];
        $grade = ""; 

        if ($nilai >= 90) {
            $grade = "A";
        } elseif ($nilai >= 85) {
            $grade = "B";
        } elseif ($nilai >= 79) {
            $grade = "C";
        } else {
            $grade = "D"; 
        }
    ?>

    <table border="3" >
        <caption>
            <b>Hasil Nilai Mahasiswa</b>
        </caption>
        <tr>
            <td>1.</td>
            <td>Nama</td>
            <td><?php echo($nama); ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Kelas</td>
            <td><?php echo($kelas); ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Mata Kuliah</td>
            <td><?php echo($matkul); ?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Nilai</td>
            <td><?php echo($nilai); ?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Grade</td>
            <td><?php echo($grade); ?></td>
        </tr>
    </table>

    <?php
    } 
    ?>
</body>
</html>