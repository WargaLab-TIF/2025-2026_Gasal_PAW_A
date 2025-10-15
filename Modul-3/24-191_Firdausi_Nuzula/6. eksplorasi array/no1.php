<?php
$cities = array("Jakarta", "Bandung", "Surabaya");

echo "<b>Array awal:</b><br>";
foreach ($cities as $kota) {
    echo $kota . "<br>";
}

array_push($cities, "Yogyakarta", "Semarang", "Medan", "Denpasar", "Makassar");

echo "<br><b>Array setelah ditambahkan data baru:</b><br>";
foreach ($cities as $kota) {
    echo $kota . "<br>";
}
?>
