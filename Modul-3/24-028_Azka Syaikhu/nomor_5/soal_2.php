<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);

$students[] = array("Hasbul", "240414", "0812345611");
$students[] = array("Kartika", "230475", "0812345195");
$students[] = array("Adib", "240426", "0812345124");
$students[] = array("Amin", "220454", "0812345879");
$students[] = array("Evan", "230467", "0812345375");


echo "<table border='1' cellpadding='5' cellspacing='5'>";


echo "<thead>";
echo "<tr>";
echo "<th>Nama</th>";
echo "<th>NIM</th>";
echo "<th>Nomor HP</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
foreach ($students as $student) {
    echo "<tr>"; 
    echo "<td>" . $student[0] . "</td>"; 
    echo "<td>" . $student[1] . "</td>"; 
    echo "<td>" . $student[2] . "</td>"; 
    echo "</tr>"; 
}
echo "</tbody>";
echo "</table>";

?>