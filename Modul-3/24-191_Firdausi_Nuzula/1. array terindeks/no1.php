<?php
echo "<b>Array awal :</b><br>" ;
$fruits = array("Avocado", "Blueberry", "Cherry" ) ;
foreach ($fruits as $buah){
    echo $buah ."<br>" ;
}

array_push($fruits, "Apple", "Grape", "Banana", "Lemon", "Orange") ;
echo "<br><b>Array setelah ditambah :</b><br>" ;
foreach ($fruits as $buah){
    echo $buah ."<br>" ;
}

$highest_index = count($fruits) - 1;
echo "<br><b>Nilai dengan indeks tertinggi adalah : </b>" . $fruits[$highest_index] . "<br>";
echo "<br><b>Indeks tertinggi dari array fruits adalah : </b>" . $highest_index;

?>