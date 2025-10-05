<?php
$t = date("H");
$nama = "Nia";

if ($t < "9") {
    echo "Selamat pagi, $nama!";
} elseif ($t < "18") {
    echo "Selamat siang, $nama!";
} else {
    echo "Selamat malam, $nama!";
}
?>