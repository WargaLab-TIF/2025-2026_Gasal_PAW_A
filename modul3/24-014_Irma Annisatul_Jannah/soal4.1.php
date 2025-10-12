<?php
 // Skrip dasar: foreach untuk menampilkan key dan value
 $height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
 foreach($height as $key => $value) {
 echo "Key= " . $key . ", Value= " . $value . "<br>";
 }
 echo "<br>";
 
 // 3.4.1 Tambahkan 5 data baru
 $Lheight = array(
 "Andre" => "170",
 "Fahry" => "152",
 "Daniel" => "165",
 "Febby" => "169",
 "Andirus" => "178"
 );
foreach($Lheight as $k => $v) {
$Lheight[$k] = $v;
}
echo "<strong>Setelah tambah 5 data (foreach yang sama tetap
bekerja):</strong><br>";
foreach($height as $key => $value) {
echo "Key= " . $key . ", Value= " . $value . "<br>";
 }
echo "<br>";

 // 3.4.2 Buat array baru $weight (3 data) dan tampilkan semuanya dengan
$Lweight = array("Ninis"=>"55", "Vedy"=>"70", "Angie"=>"62");
echo "<strong>Array baru \$Lweight (ditampilkan dengan foreach yang
sama):</strong><br>";
foreach($Lweight as $person => $kg) {
echo $person . " => " . $kg . " kg<br>";
}
?>