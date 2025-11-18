<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits); 

echo "<b>Array awal :</b><br>" ;
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

$newFruits = array("Apple", "Grape", "Banana", "Lemon", "Orange");
for ($i = 0; $i < count($newFruits); $i++) {
    $fruits[] = $newFruits[$i];
}

$arrlength = count($fruits);
echo "<br><b>Array setelah ditambah :</b><br>" ;
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br><b>Jumlah data saat ini : </b>" . count($fruits); 

?>