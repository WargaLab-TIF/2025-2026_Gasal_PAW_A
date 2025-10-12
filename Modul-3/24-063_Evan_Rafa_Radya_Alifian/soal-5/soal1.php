<?php
$students = array(
  array("Alex", "220401", "0812345678"),
  array("Bianca", "220402", "0812345687"),
  array("Candice", "220403", "0812345665"),
);

array_push($students,
  ["Evan", "220404", "0812345665"],
  ["Rafa", "220405", "0812345665"],
  ["Radya", "220406", "0812345665"],
  ["Alifian", "220407", "0812345665"],
  ["Uqi", "220408", "0812345665"]
);

for ($row = 0; $row < 8; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>" . $students[$row][$col] . "</li>";
  }
  echo "</ul>";
}