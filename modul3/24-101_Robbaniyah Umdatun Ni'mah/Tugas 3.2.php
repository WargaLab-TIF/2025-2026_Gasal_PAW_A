<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["Nia"]= "154";
$height["Kaila"]= "151";
$height["Remy"]= "176";
$height["Lusi"]= "162";
$height["Diana"]= "148";

unset($height["Diana"]);

$idx_akhir= array_key_last($height);
$nilai= $height[$idx_akhir];

echo "Nilai akhir dari index adalah: " . $nilai . " dengan index akhir: " . $idx_akhir
?>