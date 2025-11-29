<?php
$tanggal = 30;
$bulan = 2;
$tahun = 2025;

if (checkdate($bulan, $tanggal, $tahun))
    echo "Tanggal valid";
else
    echo "Tanggal tidak valid";
?>