<?php
$Lweight = array("Asby" => 65, "Chiya" => 58, "Dono" => 63);

$keys = array_keys($Lweight);
$vals = array_values($Lweight);

for ($i = 0; $i < count($Lweight); $i++) {
    echo "Nama: " . $keys[$i] . ", Berat: " . $vals[$i] . " kg<br>";
}
?>
