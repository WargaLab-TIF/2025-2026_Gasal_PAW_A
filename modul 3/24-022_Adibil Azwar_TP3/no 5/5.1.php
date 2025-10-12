<?php
$students = array
(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("Diana", "220404", "0812345699"),
    array("Eva", "220405", "0812345644")
);
for ($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
