<?php

$height = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);

$height["Ucup"] = 172;
$height["Asep"] = 169;
$height["Udin"] = 174;
$height["Mamat"] = 180;
$height["dadang"] = 177;

foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}


?>