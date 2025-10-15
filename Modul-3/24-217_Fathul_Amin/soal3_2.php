<?php
$Lheight = array(
    "Andy" => 176, "Barry" => 165, "Charlie" => 170,
    "David" => 180, "Evan" => 168, "Frank" => 172,
    "Grace" => 169, "Hana" => 174
);
unset($Lheight["Barry"]);

foreach ($Lheight as $k => $v) echo "$k : $v cm<br>";

$lastKey = array_key_last($Lheight);
echo "<br>Nilai indeks terakhir : $lastKey " . $Lheight[$lastKey] . " cm<br>";
?>
