<?php
$Lheight = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);

$Lheight["David"] = 180;
$Lheight["Evan"]  = 168;
$Lheight["Frank"] = 172;
$Lheight["Grace"] = 169;
$Lheight["Hana"]  = 174;

foreach ($Lheight as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}

$terakhir = array_key_last($Lheight);
echo "<br>Nilai dengan indeks terakhir: $terakhir " . $Lheight[$terakhir] . " cm<br>";
?>
