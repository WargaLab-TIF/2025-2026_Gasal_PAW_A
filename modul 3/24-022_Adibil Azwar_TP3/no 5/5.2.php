<?php
$students = array
(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);

echo "<br>";

$new_students = array("Adib", "220404", "0812345777");
$students[] = $new_students;
$new_students = array("Azka", "220405", "0812345888");
$students[] = $new_students;
$new_students = array("Abul", "220406", "0812345999");
$students[] = $new_students;
$new_students = array("Aqi", "220407", "0812345000");
$students[] = $new_students;
$new_students = array("Ariel", "220408", "0812345111");
$students[] = $new_students;

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