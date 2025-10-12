<?php
// sort
$nilai = [80, 90, 70, 60, 10];
sort($nilai);
var_dump($nilai);

// rsort
$nilai = [80, 90, 70, 60, 10];
rsort($nilai);
var_dump($nilai);

// asort
$tinggi = array(
    "nia" => 153,
    "kaila" => 162,
    "laila" => 156,
);
asort($tinggi);
var_dump($tinggi);

//ksort
$tinggi = array(
    "nia" => 153,
    "kaila" => 162,
    "laila" => 156,
);

ksort($tinggi);
var_dump($tinggi);