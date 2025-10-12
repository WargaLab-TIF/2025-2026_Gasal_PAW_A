<?php
$vegies = array("Carrot", "Potatoes", "Onions");

$arrlength = count($vegies);

echo "Data dari array \$vegies:<br>";
for($x = 0; $x < $arrlength; $x++) {
    echo ($x + 1) . ". " . $vegies[$x] . "<br>";
}
?>