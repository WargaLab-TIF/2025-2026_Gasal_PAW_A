<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
unset($height["Barry"]);

echo "Charlie is " . $height['Charlie'] . " cm tall.";
?>