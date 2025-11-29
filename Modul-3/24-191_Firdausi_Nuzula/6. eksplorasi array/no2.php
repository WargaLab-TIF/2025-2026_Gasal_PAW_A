<?php
$cities1 = array("Jakarta", "Bandung", "Surabaya");
$cities2 = array("Medan", "Yogyakarta", "Denpasar");

echo "<b>Array 1:</b><br>";
foreach ($cities1 as $kota) {
    echo $kota . "<br>";
}

echo "<br><b>Array 2:</b><br>";
foreach ($cities2 as $kota) {
    echo $kota . "<br>";
}

$allCities = array_merge($cities1, $cities2);


echo "<br><b>Hasil array setelah digabung :</b><br>";
foreach ($allCities as $kota) {
    echo $kota . "<br>";
}
?>
