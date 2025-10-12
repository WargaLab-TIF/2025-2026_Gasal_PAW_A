<?php

$arrA = array("red", "green", "blue");
$arrB = array("yellow", "black");

$search = array_search("green", $arrA);
echo "Hasil array_search('green') di arrA: ";
var_dump($search);
echo "<br>";

?>