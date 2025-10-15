<?php
// Array numerik
$numbers = array(40, 10, 100, 90, 20);

// Array asosiatif
$scores = array("Andi" => 85, "Budi" => 78, "Citra" => 92, "Dewi" => 70);

echo "<h3>Contoh Sorting Array Numerik</h3>";

echo "<b>Array awal:</b><br>";
print_r($numbers);
echo "<br><br>";

// sort() 
sort($numbers);
echo "<b>Hasil sort() - menaik:</b><br>";
print_r($numbers);
echo "<br><br>";

// rsort() 
rsort($numbers);
echo "<b>Hasil rsort() - menurun:</b><br>";
print_r($numbers);
echo "<br><br>";

echo "<h3>Contoh Sorting Array Asosiatif</h3>";

echo "<b>Array awal:</b><br>";
print_r($scores);
echo "<br><br>";

// asort() 
asort($scores);
echo "<b>Hasil asort() - berdasarkan nilai (menaik):</b><br>";
print_r($scores);
echo "<br><br>";

// arsort()
arsort($scores);
echo "<b>Hasil arsort() - berdasarkan nilai (menurun):</b><br>";
print_r($scores);
echo "<br><br>";

// ksort() 
ksort($scores);
echo "<b>Hasil ksort() - berdasarkan key (menaik):</b><br>";
print_r($scores);
echo "<br><br>";

// krsort()
krsort($scores);
echo "<b>Hasil krsort() - berdasarkan key (menurun):</b><br>";
print_r($scores);
?>
