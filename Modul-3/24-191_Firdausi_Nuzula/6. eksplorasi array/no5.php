<?php
$nilai = array(85, 60, 92, 45, 75, 88, 55);

echo "<b>Data nilai awal:</b><br>";
print_r($nilai);
echo "<br><br>";

$lulus = array_filter($nilai, function($n) {
    return $n >= 75;
});

echo "<b>Data nilai yang lulus (>= 75):</b><br>";
print_r($lulus);
echo "<br><br>";

echo "<b>Nilai lulus:</b><br>";
foreach ($lulus as $n) {
    echo $n . "<br>";
}
?>
