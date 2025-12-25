<?php
$numbers = array(4, 1, 8, 3);
echo "Array awal: ";
print_r($numbers);
echo "<br><hr>";

// sort(): mengurutkan dari kecil ke besar
sort($numbers);
echo "Setelah di-sort() (A-Z): ";
print_r($numbers);
echo "<br>";

// rsort(): mengurutkan dari besar ke kecil
rsort($numbers);
echo "Setelah di-rsort() (Z-A): ";
print_r($numbers);
echo "<br><hr>";

$scores = array("Budi"=>85, "Ani"=>92, "Candra"=>78);
echo "Array asosiatif awal: ";
print_r($scores);
echo "<br><hr>";

// asort(): mengurutkan array asosiatif berdasarkan nilai (value)
asort($scores);
echo "Setelah di-asort() (urut berdasarkan nilai): ";
print_r($scores);
echo "<br>";

// ksort(): mengurutkan array asosiatif berdasarkan kunci (key)
ksort($scores);
echo "Setelah di-ksort() (urut berdasarkan nama): ";
print_r($scores);
echo "<br>";
?>
