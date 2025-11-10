<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$buahTambahan = array("Jambu", "Pier", "Semangka", "Jeuk", "Pisang");

for ($i = 0; $i < count($buahTambahan); $i++) {
    $fruits[] = $buahTambahan[$i];
}

$arrLength = count($fruits);

for ($x = 0; $x < $arrLength; $x++) {
    echo $fruits[$x] . "<br>";
}
?>
