<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

array_push($fruits, "Banana", "Apple", "Grapes", "Salak", "Durian");
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
?>