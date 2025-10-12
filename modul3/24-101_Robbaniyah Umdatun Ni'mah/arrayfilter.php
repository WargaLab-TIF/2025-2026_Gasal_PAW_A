<?php
//array filter
$tinggi = array(
    "nia" => 153,
    "kaila" => 162,
    "laila" => 156,
);

$tinggi_dibawah_160 = array_filter($tinggi, function ($tinggi){
    if($tinggi >= 160){
        return false;
    } else {
        return true;
    }
});

var_dump($tinggi);
var_dump($tinggi_dibawah_160);