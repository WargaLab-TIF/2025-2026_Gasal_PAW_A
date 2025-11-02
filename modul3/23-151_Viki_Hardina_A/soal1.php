<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> kode Soal</h2>
    <!-- soal 1 -->
<?php 
$Lfruits = array("Avocado", "Blueberry", "Cherry"); 
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . 
". <br> "; 4. ?>

<h2 > Menambahkan lima data baru dalam array Lfruits! Tampilkan nilai dengan indeks
tertinggi dari array Lfruits! Berapa indeks tertinggi dari array Lfruits? </h2>
<!-- no 1 -->
<?php 
$Lfruits = array("Samsung", "xiomi", "snapnug","realme", "redmi"); 
$index_tertinggi = count($Lfruits) -1 ;
echo "I like " . $Lfruits[0] . ", " . $Lfruits[1] . ", " . $Lfruits[2] . " , " .  $Lfruits[3] . " and " . $Lfruits[4] . 
"." . "<br>index tertinggi : " .count($Lfruits) . "<br> vallue " . $Lfruits[$index_tertinggi] ; 4. ?>


<h2> Hapus satu data tertentu dari array Lfruits! Tampilkan nilai dengan indeks tertinggi
dari array Lfruits! Berapa indeks tertinggi dari array Lfruits?</h2>
<!-- no 2 -->
<?php
unset($Lfruits[4]); 
$indeks_tertinggi = max(array_keys($Lfruits));
echo "Indeks tertinggi setelah penghapusan: $indeks_tertinggi<br>";
echo "Nilainya: " . $Lfruits[$indeks_tertinggi]. "<br>";
?>

<h2> Buat array baru dengan nama Lvegies yang memiliki tiga buah data! Tampilkan
seluruh data dari array Lvegies!</h2>
<!-- no 3 -->
<?php
$Lvegies = array("utm","unair","ui");
foreach ($Lvegies as $v) {
    echo "<br>Nilai Lvegies: $v <br>" ;
}
?>

<h2>
Tambahkan 5 data baru dalam Lfruits menggunakan perulangan foreach, lalu tampilkan seluruhnya</h2>
<!-- no 4 -->
<?php
for ($i = 0; $i < 5; $i++) {
    $Lfruits[] = "Fruit" . ($i+1);
}
for ($x = 0; $x < count($Lfruits); $x++) {
    echo $Lfruits[$x] . "<br>";
}
?>


<h2>
Buat array Lvegies dan tampilkan dengan struktur perulangan foreach</h2>
<!-- no 5 -->
<?php
$Lvegies = array("Carrot", "Broccoli", "Spinach");
for ($i = 0; $i < count($Lvegies); $i++) {
    echo $Lvegies[$i] . "<br>";
}
?>

<h2>Menambahkan lima data baru dalam array Lfruits dengan perulangan FOR</h2>
<?php
$Lfruits = array("Avocado", "Blueberry", "Cherry");

for ($i = 1; $i <= 5; $i++) {
    $Lfruits[] = "Fruit" . $i;
}

$arrlength = count($Lfruits);
for ($x = 0; $x < $arrlength; $x++) {
    echo $Lfruits[$x] . "<br>";
}

echo "<br>Panjang array Lfruits saat ini: " . $arrlength;
?>


<h2>Buat array baru Lvegies dan tampilkan dengan struktur FOR<h2>
<?php
$Lvegies = array("Carrot", "Broccoli", "Spinach");
$arrlength = count($Lvegies);

for ($x = 0; $x < $arrlength; $x++) {
    echo $Lvegies[$x] . "<br>";
}
?>

</body>
</html>

