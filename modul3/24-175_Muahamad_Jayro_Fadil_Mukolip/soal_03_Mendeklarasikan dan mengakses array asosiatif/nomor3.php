<?php
$Tbadan = array('andi' => '170', 'budi' => '156', 'jayro' => '171');

echo "<br><h1>Array Tinggi Badan</h1>";
echo '<br>nilai array terakhir :' . $Tbadan[array_key_last($Tbadan)] . '<br>jumlah item di array : ' . count($Tbadan);

$Bbadan = array('andi' => '70', 'budi' => '56', 'jayro' => '71');

echo "<br><h1>Array Berat Badan</h1>";
echo '<br>nilai array terakhir :' . $Tbadan['budi'] . '<br>jumlah item di array : ' . count($Tbadan);