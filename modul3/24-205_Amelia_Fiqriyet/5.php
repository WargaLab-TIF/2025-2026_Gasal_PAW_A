<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

// SOAL 1
// Tambah 5 data baru ke array
$students[] = array("Darren", "220404", "0812345699");
$students[] = array("Eliza", "220405", "0812345601");
$students[] = array("Felix", "220406", "0812345612");
$students[] = array("Grace", "220407", "0812345623");
$students[] = array("Hannah", "220408", "0812345634");

// data dalam bentuk list
echo "<h3>Data Mahasiswa (dalam format list)</h3>";

for ($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

// SOAL 2
// jadikan bentuk tabel
echo "<h3>Data Mahasiswa (dalam format tabel)</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>No. HP</th>
      </tr>";

// Loop isi tabel
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
