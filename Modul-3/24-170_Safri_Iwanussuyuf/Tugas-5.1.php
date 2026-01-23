<?php

$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

for ($row = 0; $row < 3; $row++) {
echo "<p><b>Row number $row</b></p>";
echo "<ul>";
for ($col = 0; $col < 3; $col++) {
echo "<li>".$students[$row][$col]."</li>";
}
echo "</ul>";
}

array_push(
    $students,
    array("Daniel", "220404", "0812345611"),
    array("Ella", "220405", "0812345622"),
    array("Fiona", "220406", "0812345633"),
    array("George", "220407", "0812345644"),
    array("Harry", "220408", "0812345655")
);

?>