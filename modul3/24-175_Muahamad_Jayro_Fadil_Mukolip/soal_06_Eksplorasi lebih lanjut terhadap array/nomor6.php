<?php

$randNum = [42, 8, 99, 15, 73, 22, 68, 34, 87, 50];
echo "array awal<br>";
print_r($randNum);

echo "<br>array sorted<br>";
asort($randNum);
print_r($randNum);

echo "<br><br><br>";

$peringkat = [
    'andi' => 5,
    'budi' => 3,
    'santi' => 4,
    'rudi' => 1,
    'rani' => 2
];

asort($peringkat);
echo "<br>peringkat kelas <br>";
foreach ($peringkat as $key => $value) {
    echo "$key pringkat $value <br>";
}