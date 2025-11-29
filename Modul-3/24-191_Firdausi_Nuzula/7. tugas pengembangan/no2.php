<!DOCTYPE html>
<html>
<head>
    <title>Hitung Rata-rata Nilai</title>
</head>
<body>

    <h2>Data Nilai Mahasiswa</h2>

    <?php
    $data_mahasiswa = [
        ['nama' => 'Uqi', 'nilai' => 85],
        ['nama' => 'Evan', 'nilai' => 92],
        ['nama' => 'Adib', 'nilai' => 78],
        ['nama' => 'Hasbul', 'nilai' => 75],
        ['nama' => 'Azka', 'nilai' => 88],
    ];

    function hitungRataRataNilai($mahasiswa) {
        $total_nilai = 0;
        $jumlah_mahasiswa = count($mahasiswa);

        if ($jumlah_mahasiswa == 0) {
            return 0;
        }

        foreach ($mahasiswa as $item) {
            $total_nilai += $item['nilai'];
        }

        $rata_rata = $total_nilai / $jumlah_mahasiswa;

        return $rata_rata;
    }

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Nama</th><th>Nilai</th></tr>";
    foreach ($data_mahasiswa as $mhs) {
        echo "<tr><td>" . $mhs['nama'] . "</td><td>" . $mhs['nilai'] . "</td></tr>";
    }
    echo "</table>";

    $rata_rata_kelas = hitungRataRataNilai($data_mahasiswa);
    echo "<br><b>Rata-rata nilai semua mahasiswa adalah : </b>" . round($rata_rata_kelas, 2) ;

    ?>

</body>
</html>