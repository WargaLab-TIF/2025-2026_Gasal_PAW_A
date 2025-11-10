<?php
echo "<b>Array awal :</b><br>" ;
$fruits = array("Avocado", "Blueberry", "Cherry" ) ;
foreach ($fruits as $buah){
    echo $buah . "<br>" ;
}

unset($fruits[2]);
echo "<br><b>Array setelah dihapus :</b><br>" ;
foreach ($fruits as $buah){
    echo $buah . "<br>" ;
}


$fruits = array_values($fruits);
$highest_index = count($fruits) - 1;
echo "<br><b>Nilai dengan indeks tertinggi adalah : </b>" . $fruits[$highest_index] . "<br>";
echo "<br><b>Indeks tertinggi dari array fruits adalah : </b>" . $highest_index;
?>