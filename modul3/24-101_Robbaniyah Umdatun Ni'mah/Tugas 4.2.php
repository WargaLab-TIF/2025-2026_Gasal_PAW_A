<?php
$weight = array("Andy"=>"62", "Barry"=>"70", "Charlie"=>"65");

// Saya cuma modif weight
// karena foreach itu akan otomatis mengikuti key dan value dari array yang di iterasi

foreach($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>