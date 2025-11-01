<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$fruits[]= "Mango";
$fruits[]= "Apple";
$fruits[]= "Banana";
$fruits[]= "Citrus";
$fruits[]= "Beet";


$arrlength = count($fruits);
    echo "panjang array \$fruits sekarang: " . $arrlength . " data <br>";

for($x = 0; $x < $arrlength; $x++) {
    echo ($x + 1) . ". " . $fruits[$x];
    echo "<br>";
}
?>