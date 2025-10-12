<?php

$nilai_mhs = array(
    "Nia" => 70,
    "Kaila" => 80,
    "Laila" => 60,
    "Remy" => 75
);

function hitungRata($nilai_mhs){
    $total = 0;

    foreach($nilai_mhs as $nilai){
        $total += $nilai;
    }

    $jumlah_mhs = count($nilai_mhs);

    return $total / $jumlah_mhs;
}

$rata_rata = hitungRata($nilai_mhs);
echo $rata_rata;