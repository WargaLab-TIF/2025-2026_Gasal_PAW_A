<?php
//array_merge
$fruits = array("Apel", "Melon");
array_push($fruits, "Manggis");

$fruits2 = array("Melon");
$fruits3 = array_merge($fruits, $fruits2);
var_dump($fruits3);