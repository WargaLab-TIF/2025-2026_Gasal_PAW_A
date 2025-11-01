<?php 
$fruits = array("Avocado", "Blueberry", "Cherry");
$fruits[]= "Pinapple";
$fruits[]= "Banana";
$fruits[]= "Watermelon";
$fruits[]= "Guava";
$fruits[]= "Cucumber";

array_splice($fruits,3, 1);
var_dump($fruits);
?>