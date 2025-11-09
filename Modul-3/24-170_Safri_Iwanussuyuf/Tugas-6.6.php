<?php

$arrA = array("red", "green", "blue");
$arrB = array("yellow", "black");

sort($arrA);
echo "Hasil sort(): ";
print_r($arrA);
echo "<br>";

rsort($arrA);
echo "Hasil rsort(): ";
print_r($arrA);
echo "<br>";

sort($arrB);
echo "Hasil sort(): ";
print_r($arrB);
echo "<br>";

rsort($arrB);
echo "Hasil rsort(): ";
print_r($arrB);
echo "<br>";

?>