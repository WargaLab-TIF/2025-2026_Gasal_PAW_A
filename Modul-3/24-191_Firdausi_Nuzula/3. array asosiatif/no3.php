<?php
$weight = array("Abdullah" => "70", "Nurizqi" => "80", "Uqi" => "90");
echo "<b>Array weight : </b><br>" ;
foreach ($weight as $nama => $berat){
    echo "$nama : $berat kg <br>" ;
}

echo "<br><b>Data kedua dari array : </b>" . $weight['Nurizqi'];
?>