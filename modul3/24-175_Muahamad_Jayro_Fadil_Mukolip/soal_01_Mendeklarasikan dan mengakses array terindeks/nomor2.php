<?php

$buah = array('pisang','apukad','jambu');
echo "I like " . $buah[0] . ", " . $buah[1] . " dan " . $buah[2] . ".";

array_push($buah,'mangga','apel','jeruk','anggur','semangka');

$index = count($buah) - 1;

echo '<br> <h1>Array awal</h1>';
var_dump($buah);
echo '<br>nilai array terakhir :' . $buah[$index] . '<br>index array terakhir : ' . $index;


unset($buah[$index]);

$index = count($buah) - 1;

echo '<br> <h1>Array akhir</h1>';
var_dump($buah);
echo '<br>nilai array terakhir :' . $buah[$index] . '<br>index array terakhir : ' . $index;