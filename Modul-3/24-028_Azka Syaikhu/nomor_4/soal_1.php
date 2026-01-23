<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$height += [
    "Abul" => "177",
    "Memet" => "187",
    "Budi" => "165",
    "Amin" => "160",
    "Adul" => "165",
];

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>