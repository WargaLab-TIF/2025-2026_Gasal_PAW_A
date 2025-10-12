<?php
//search
$fruits = array("Apel", "Melon");
array_push($fruits, "Manggis");

$idx= array_search("Melon", $fruits);
var_dump($idx);