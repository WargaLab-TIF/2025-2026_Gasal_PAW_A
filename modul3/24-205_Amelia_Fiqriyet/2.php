<?php
$fruits = array("avocado", "blueberry", "cherry");

// SOAL 1
// tambah 5 data baru dengan loop for
$newFruits = array("mango", "banana", "orange", "apple", "watermelon");

for($i = 0; $i < count($newFruits); $i++){
    $fruits[] = $newFruits[$i];
}

$arrlength = count($fruits); //hitung array setelah penambahan
echo "isi array fruits: <br>"; //nampilin seluruh isi array
for($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x];
    echo "<br>";
}
echo "<br>panjang array fruits saat ini: " . $arrlength . "<br><br>";

// SOAL 2
$vegies = array("carrot", "tomato", "broccoli");

$vegLength = count($vegies); //hitung panjang array vegies

echo "isi array vegies:<br>";
for($j = 0; $j < $vegLength; $j++){
    echo $vegies[$j] . "<br>";
}
?>
