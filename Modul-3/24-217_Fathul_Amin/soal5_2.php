<?php
$Lstudents = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("Daniel", "220404", "0812345644"),
    array("Elsa", "240404", "0812345699"),
    array("Fara", "240405", "0812345670"),
    array("Sandy", "240406", "0812345611"),
    array("Bhya", "240407", "0812345622")
);

echo "<table border='1' cellpadding='6'";
echo "<tr><th>Nama</th><th>NIM</th><th>No HP</th></tr>";

for ($i = 0; $i < count($Lstudents); $i++) {
    echo "<tr>";
    echo "<td>" . $Lstudents[$i][0] . "</td>";
    echo "<td>" . $Lstudents[$i][1] . "</td>";
    echo "<td>" . $Lstudents[$i][2] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br>Total mahasiswa: " . count($Lstudents);
?>
