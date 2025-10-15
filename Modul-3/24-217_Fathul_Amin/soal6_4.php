<?php
$buah = array("Apel", "Jeruk", "Mangga", "Pisang");
$cari = "Mangga";

$hasil = array_search($cari, $buah);

if ($hasil !== false) {
    echo "$cari ditemukan di indeks ke-$hasil";
} else {
    echo "$cari tidak ditemukan";
}
?>