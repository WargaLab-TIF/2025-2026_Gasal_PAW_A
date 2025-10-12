<?php
$students = array
(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("Diana", "220404", "0812345699"),
    array("Eva", "220405", "0812345644")
);
echo "<table border='1'>";
    echo "<tr><th>Name</th><th>ID</th><th>Phone</th></tr>";
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>