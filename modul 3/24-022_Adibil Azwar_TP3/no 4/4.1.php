<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$height += [
    "Hasya" => "160",
    "Adib" => "187",
    "Belva" => "158",
    "Azwar" => "174",
    "Hayu" => "165",
];

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>