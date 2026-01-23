<?php
$Lfruits = array("Avocado", "Blueberry", "Cherry", "Mango", "Apple", "Banana", "Orange", "Grape");

array_splice($Lfruits, 2, 1);

foreach ($Lfruits as $index => $value) {
    echo "Index $index : $value <br>";
}

$lastIndex = array_key_last($Lfruits);
echo "<br>Indeks tertinggi sekarang: " . $lastIndex . " dengan nilai: " . $Lfruits[$lastIndex] . "<br>";
?>
