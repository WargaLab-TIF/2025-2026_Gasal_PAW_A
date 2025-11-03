<?php
$students = array(
  array("Alex", "220401", "0812345678"),
  array("Bianca", "220402", "0812345687"),
  array("Candice", "220403", "0812345665"),
  array("Uqi", "220404", "08123456789"),
  array("Amin", "220405", "08123456789"),
  array("Reno", "220406", "08123456789"),
  array("Izul", "220407", "08123456789"),
  array("Raihan", "220408", "08123456789")
);

echo "<b>Array setelah ditambah : </b><br>";
for ($row = 0; $row < count($students); $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < count($students[$row]); $col++) {
    echo "<li>" . $students[$row][$col] . "</li>";
  }
  echo "</ul>";
}
?>