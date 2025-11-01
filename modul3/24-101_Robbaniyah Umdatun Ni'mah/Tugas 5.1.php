<?php 
$students = array( 
    array("Alex","220401","0812345678"), 
    array("Bianca","220402","0812345687"), 
    array("Candice","220403","0812345665"),
); 

array_push($students, array("Nia", "220405", "0812663627"));
array_push($students, array("Kaila", "220406", "0812745387"));
array_push($students, array("Lani", "220407", "0812725483"));
array_push($students, array("Remy", "220408", "0812734827"));
array_push($students, array("Shella", "220409", "0812385634"));

for ($row = 0; $row < 8; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
for ($col = 0; $col < 3; $col++) {
    echo "<li>".$students[$row][$col]."</li>";
  }
    echo "</ul>";
}
?>
