<?php
$students = array
(
array("Alex","220401","0812345678"),
array("Bianca","220402","0812345687"),
array("Candice","220403","0812345665"),
);

$students[] = array("Hasbul", "240414", "0812345611"); 
$students[] = array("Kartika", "230475", "0812345195"); 
$students[] = array("Adib", "240426", "0812345124"); 
$students[] = array("Amin", "220454", "0812345879"); 
$students[] = array("Evan", "230467", "0812345375"); 


for ($row = 0; $row < 8; $row++) {
     echo "<p><b>Row number $row</b></p>";
     echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
    echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}

?>