<?php
//soal 3.1.1 membuat data 
$Lfruits = array ("Avocado", "Blueberry", "Cherry");
//soal 3.1 setelah menambahkan 5 data array
$Lfruits[] = "Semangka";
$Lfruits[] = "Nanas";
$Lfruits[] = "Melon";
$Lfruits[] = "Tomat";
$Lfruits[] = "Pisang";
echo "<br>";
var_dump($Lfruits);
echo "<br>";

//menampilkan nilai tertinggi dari array tertinggi
$indeks_tertinggi = count($Lfruits) - 1;
echo "Indeks tertinggi: $indeks_tertinggi <br>";
echo "Nilai pada indeks tersebut: " .  $Lfruits[$indeks_tertinggi];
echo "<br>";

//soal 3.1.2 menghapus satu data tertentu misalnya nanas
$index_yang_dihapus = 4;
$removed_item = $Lfruits[$index_yang_dihapus];
unset($Lfruits[$index_yang_dihapus]);
$Lfruits = array_values($Lfruits); //reindex array
echo "<strong>Data yang yang ingin dihapus: </strong> " . $removed_item . " (indeks
" .  $index_yang_dihapus . ")<br>";
echo "<strong>Array \$Lfruits setelah dihapus 1 data:</strong><br>";
var_dump($Lfruits);
echo "<br>";

//menampilkan nilai index tertinggi
$indeks_tertinggi_terbaru = count($Lfruits)- 1;
echo "<strong>Nilai dengan indeks tertinggi setelah
penghapusan:</strong> " . $Lfruits[$indeks_tertinggi_terbaru] . "<br>";
echo "<strong>Indeks tertinggi setelah penghapusan:</strong> " .
$indeks_tertinggi_terbaru . "<br><br>";

//soal 3.1.3 membuat array baru dengan nama Lvegies
$Lveggies = array("Bayam", "Cabai", "Kangkung");
var_dump($Lveggies);
echo "<br>";
echo "<strong>Seluruh data dari \$veggies:</strong><br>";
foreach($Lveggies as $index => $sayur) {
echo "Indeks " . $index . ": " . $sayur . "<br>";
}
?>