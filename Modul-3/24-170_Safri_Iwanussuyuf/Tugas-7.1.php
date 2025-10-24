<?php

$produk = array(
    "Ayam" => 60000,
    "Daging" => 200000,
    "Bawang" => 25000,
    "Telur" => 18000
);

echo "<b>Daftar Produk:</b><br>";
foreach ($produk as $p => $h) {
    echo "$p : Rp" . $h . "<br>";
}


?>