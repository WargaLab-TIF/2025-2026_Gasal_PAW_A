<?php
$angka = array(10, 25, 30, 45, 60, 15);
$hasil = array_filter($angka, function($n) {
    return $n > 30;
});

foreach ($hasil as $h) {
    echo $h . "<br>";
}
?>