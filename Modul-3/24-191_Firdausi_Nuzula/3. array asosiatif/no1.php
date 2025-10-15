<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

echo "<b>Array awal :</b><br>";
foreach ($height as $name => $value) {
    echo "$name : $value cm<br>";
}

$newHeight = array(
    "Uqi" => "150",
    "Azka" => "160",
    "Habiba" => "170",
    "Amin" => "180",
    "Hasbul" => "190"
);

foreach ($newHeight as $name => $value) {
    $height[$name] = $value;
}

echo "<br><b>Array setelah ditambah :</b><br>";
foreach ($height as $name => $value) {
    echo "$name : $value cm<br>";
}

$lastValue = end($height);
echo "<br><b>Nilai terakhir dalam array : </b> " . $lastValue . " cm";
?>
