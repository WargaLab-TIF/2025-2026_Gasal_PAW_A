<?php
$warna = array("a" => "Merah", "b" => "Hijau", "c" => "Biru");
$nilai = array_values($warna);

for ($i = 0; $i < count($nilai); $i++) {
    echo $nilai[$i] . "<br>";
}
?>