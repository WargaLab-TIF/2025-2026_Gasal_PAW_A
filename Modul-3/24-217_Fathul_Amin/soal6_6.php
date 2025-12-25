<?php
$hewan = array("Badak", "Ayam", "Cacing", "Domba");

echo "<b>Urutan Asli:</b><br>";
print_r($hewan);

sort($hewan); 
echo "<br><br><b>Setelah sort() A-Z : </b><br>";
print_r($hewan);

rsort($hewan); 
echo "<br><br><b>Setelah rsort() Z-A : </b><br>";
print_r($hewan);
?>