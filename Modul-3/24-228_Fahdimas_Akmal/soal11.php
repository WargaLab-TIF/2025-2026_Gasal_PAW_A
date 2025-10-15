<?php
// Array awal dengan 3 data mahasiswa
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);

// 1. Menambahkan lima data baru dalam array $students
//    Setiap data baru adalah sebuah array di dalam array utama.
$students[] = array("David", "220404", "0812345611");
$students[] = array("Ethan", "220405", "0812345622");
$students[] = array("Fiona", "220406", "0812345633");
$students[] = array("George", "220407", "0812345644");
$students[] = array("Hannah", "220408", "0812345655");

// 2. Tampilkan data dalam array $students dalam bentuk tabel
echo "<h1>Data Mahasiswa</h1>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Mobile</th>
        </tr>
      </thead>";
echo "<tbody>";

// Menggunakan foreach untuk iterasi setiap baris (data mahasiswa)
foreach ($students as $student) {
    echo "<tr>";
    // Menggunakan foreach lagi untuk iterasi setiap kolom (nama, nim, mobile)
    foreach ($student as $data) {
        echo "<td>" . $data . "</td>";
    }
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>