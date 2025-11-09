<?php 
$fruits = array("Avocado", "Blueberry", "Cherry"); 
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . "."."<br>"; 

$fruits[3]='Strawberry';
$fruits[4]='Lemon';
$fruits[5]='grape';
$fruits[6]='melon';
$fruits[7]='manggo';

echo $fruits[7];

echo "indeks tertinggi sekarang: ". count($fruits)-1;
?>