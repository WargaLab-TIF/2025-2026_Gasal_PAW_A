<?php
$buah1 = array("Apel", "Jeruk");
$buah2 = array("Mangga", "Pisang");

$hasil = array_merge($buah1, $buah2);

foreach ($hasil as $b) {
    echo $b . "<br>";
}
?>