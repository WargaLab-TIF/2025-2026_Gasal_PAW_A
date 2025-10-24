<?php
$Tbadan = array('andi' => '170', 'budi' => '156', 'jayro' => '171');

$Tbadan['yanto'] = '150';
$Tbadan['yohanes'] = '157';
$Tbadan['evan'] = '156';
$Tbadan['abdi'] = '170';
$Tbadan['isa'] = '172';

var_dump($Tbadan);
echo '<br>nilai array terakhir :' . $Tbadan[array_key_last($Tbadan)] . '<br>jumlah item di array : ' . count($Tbadan);