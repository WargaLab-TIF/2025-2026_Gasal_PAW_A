<?php

$Lweight = array("Andy" => 65, "Barry" => 59, "Charlie" => 63);

$filtered = array_filter($Lweight, fn($val) => $val > 60);
echo "array_filter berat > 60: ";
print_r($filtered);
echo "<br>";
?>