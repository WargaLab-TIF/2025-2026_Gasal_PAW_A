<?php
$Lfruits = array("Avocado", "Blueberry", "Cherry");
array_push($Lfruits, "Mango", "Apple", "Banana", "Orange", "Grape");

foreach ($Lfruits as $index => $value) {
    echo "Index $index : $value <br>";
}

$lastIndex = array_key_last($Lfruits);
echo "<br>Indeks tertinggi: " . $lastIndex . " dengan nilai " . $Lfruits[$lastIndex] . "<br>";
?>