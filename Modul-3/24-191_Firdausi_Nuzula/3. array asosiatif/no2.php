<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "<b>Array awal : <br></b>";
foreach ($height as $nama => $tinggi){
    echo "$nama : $tinggi cm <br>" ;
}

unset($height['Barry']) ;
echo "<br><b>Array setelah dihapus : <br></b>";
foreach ($height as $nama => $tinggi){
    echo "$nama : $tinggi cm <br>" ;
}

$lastValue = end($height);
echo "<br><b>Indeks terakhir dari array adalah : </b>" . $lastValue.  " cm" ;
?>