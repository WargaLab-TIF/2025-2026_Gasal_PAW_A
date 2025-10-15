<?php
$inventory = array("CPU", "RAM", "SSD", "GPU");
$item_to_find = "SSD";

// Mencari posisi "SSD" di dalam inventaris
$item_index = array_search($item_to_find, $inventory);

if ($item_index !== false) {
    echo "Barang '" . $item_to_find . "' ditemukan pada rak nomor (indeks): " . $item_index;
} else {
    echo "Barang '" . $item_to_find . "' tidak ditemukan.";
}
?>
