<?php
$angka = [10, 5, 80, 25];
echo "Array Awal: ";
print_r($angka);

rsort($angka);

echo "<br>Setelah di-rsort(): ";
print_r($angka);
?>