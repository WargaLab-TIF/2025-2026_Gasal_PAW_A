<?php

$nilai = array(
    array("Nama" => "Asep", "Nilai" => array(80, 75, 90)),
    array("Nama" => "Ucup", "Nilai" => array(70, 85, 88)),
    array("Nama" => "Dudung", "Nilai" => array(90, 92, 89))
);

echo "<br><b>Rata-rata Nilai Mahasiswa:</b><br>";

function rata_rata($array){
    foreach ($array as $mhs) {
        $avg = array_sum($mhs["Nilai"]) / count($mhs["Nilai"]);
        echo $mhs["Nama"] . " = " . $avg . "<br>";
    }
}

rata_rata($nilai)
?>