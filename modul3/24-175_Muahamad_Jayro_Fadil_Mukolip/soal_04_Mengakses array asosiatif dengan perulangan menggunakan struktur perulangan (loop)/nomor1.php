<?php
function tampilkan($array){
    $tampil = '';
    foreach ($array as $key => $value) {
        $tampil .= "Key = " . $key . ", Value = " . $value . "<br>"; 
    }
    echo $tampil;
}


$Tbadan = array('andi' => '170', 'budi' => '156', 'jayro' => '171');

echo "<br><h1>Array awal</h1>";
tampilkan($Tbadan);

$tambah = [
    'yanto' => '150',
    'yohanes' => '157',
    'evan' => '156',
    'abdi' => '170',
    'isa' => '172'
];

foreach ($tambah as $key => $value) {
    $Tbadan[$key] = $value;
}

echo "<br><h1>Array baru</h1>";
tampilkan($Tbadan);