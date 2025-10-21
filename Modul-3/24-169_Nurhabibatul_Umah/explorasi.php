<?php
$brandOutdoor = ["Eiger", "Consina", "Rei", "Osprey"];

// ==== Implementasi Fungsi array_push() ====
echo "Implementasi array_push()";
echo "<br>";
array_push($brandOutdoor, "push - 1", "push - 2", "push - 3");
print_r($brandOutdoor);
echo "<br>";
echo "<br>";

// ==== Implementasi Fungsi array_merge() ====
$brandShoes = ["nike", "onitsuka", "adidas", "puma"];
echo "Implementasi array_merge()";
echo "<br>";
print_r(array_merge($brandOutdoor,$brandShoes)); //menggabungkan 2 array
echo "<br>";
echo "<br>";

// ==== Implementasi Fungsi array_values() ====
echo "Implementasi array_values()";
echo "<br>";
$fashion = [
    "baju" => "zara",
    "sepatu" => "New Balance",
    "tas" => "eiger"
];
$values = array_values($fashion); //memberikan indeks secara numerik
print_r($values);
echo "<br>";
echo "<br>";

// ==== Implementasi Fungsi array_search() ====
echo "Implementasi array_search()";
echo "<br>";
$searchbrandOutdoor = array_search("Salomon", $brandOutdoor); //mencari indeks dari value
if ($searchbrandOutdoor !== false){
    echo "Indeks pada 'Salomon' adalah: " . $searchbrandOutdoor;
}else{
    echo "'Salomon' tidak ditemukan";
}
echo "<br>";
echo "<br>";

// ==== Implementasi Fungsi array_filter() ====
echo "Implementasi array_filter()";
echo "<br>";
$filterbrandOutdoor = array_filter($brandOutdoor, function($value){ //menampilkan yang valuenya > 6
    return strlen($value) > 6;
});
print_r($filterbrandOutdoor);
echo "<br><br>";

// ==== Implementasi Fungsi sort() ====
echo "Implementasi Fungsi sorting pada array";
echo "<br><br>";

// 1. sort() => urutan menaik
echo "Implementasi sort()";
echo "<br>";
$sort_arr = [2, 5, 6, 9, 3, 4];
sort($sort_arr);
$arrlength = count($sort_arr);
for ($x = 0; $x < $arrlength; $x++){
    echo $sort_arr[$x];
    echo "<br>";
}
echo "<br>";

// 2. rsort() => urutan menurun
echo "Implementasi rsort()";
echo "<br>";
$sort_arr = [2, 5, 6, 9, 3, 4];
rsort($sort_arr);
$arrlength = count($sort_arr);
for ($x = 0; $x < $arrlength; $x++){
    echo $sort_arr[$x];
    echo "<br>";
}
echo "<br>";

// 3. asort() => mengurutkan array asosiatif urutan menaik berdasarkan nilainya
echo "Implementasi asort()";
echo "<br>";
$umur = [
    "Habiba" => 19,
    "Andira" => 8,
    "Wifa" => 3,
    "Hanabi" => 10
];
asort($umur);
foreach ($umur as $u => $u_val){
    echo "Key: " . $u . " Value: " . $u_val;
    echo "<br>";
}
echo "<br>";

// 4. ksort() => mengurutkan array asosiatif urutan menaik berdasarkan kuncinya
echo "Implementasi ksort()";
echo "<br>";
$umur = [
    "Habiba" => 19,
    "Andira" => 8,
    "Wifa" => 3,
    "Hanabi" => 10
];
ksort($umur);
foreach ($umur as $u => $u_val){
    echo "Key: " . $u . " Value: " . $u_val;
    echo "<br>";
} 
echo "<br>";

// 5. arsort() => mengurutkan array asosiatif urutan menurun berdasarkan nilainya 
echo "Implementasi arsort()";
echo "<br>";
$umur = [
    "Habiba" => 19,
    "Andira" => 8,
    "Wifa" => 3,
    "Hanabi" => 10
];
arsort($umur);
foreach ($umur as $u => $u_val){
    echo "Key: " . $u . " Value: " . $u_val;
    echo "<br>";
} 
echo "<br>";

// 6. krsort() => mengurutkan array asosiatif urutan menurun berdasarkan kuncinya 
echo "Implementasi krsort()";
echo "<br>";
$umur = [
    "Habiba" => 19,
    "Andira" => 8,
    "Wifa" => 3,
    "Hanabi" => 10
];
krsort($umur);
foreach ($umur as $u => $u_val){
    echo "Key: " . $u . " Value: " . $u_val;
    echo "<br>";
} 
?>