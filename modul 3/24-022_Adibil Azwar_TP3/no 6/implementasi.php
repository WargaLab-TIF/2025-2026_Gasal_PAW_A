<?php
$student = array("Alex", "220401", "0812345678");

// array push
array_push($student, "New York", "USA");
var_dump($student);
echo "<br>";

// array merge
$additionalInfo = array("PAW", "A");
$mergedStudent = array_merge($student, $additionalInfo);
var_dump($mergedStudent);
echo "<br>";

// array values
$data = [
  "nama" => "Adib",
  "umur" => 20,
  "kota" => "Bangkalan"
];

$hasil = array_values($data);
var_dump($hasil);
echo "<br>";


// array search
$search = array_search("New York", $student);
echo $search;
echo "<br>";

//array filter
$numbers = [1, 2, 3, 4, 5, 6, null, 8, false, 10];
$filtered = array_filter($numbers);
var_dump($filtered);
echo "<br>";

//array sort
$num = [3, 2, 5, 6, 1, 4];
sort($num);
var_dump($num);
echo "<br>";

//array sort rsort
rsort($num);
var_dump($num);
echo "<br>";
?>