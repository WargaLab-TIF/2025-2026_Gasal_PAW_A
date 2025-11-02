<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2> kode Soal</h2>

<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}
?>
<h2>Menambahkan lima data baru dalam array Lheight!</h2>
<!-- no1 -->
<?php
$rheight = array("Andik"=>"170", "Bany"=>"175", "Chalie"=>"180", "brian"=>"185", "woody"=>"200");

foreach($rheight as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}
?>

<h2>Buat array baru dengan nama Lweight yang memiliki tiga buah data! Tampilkan
seluruh data dari array Lweight dengan menggunakan stuktur perulangan FOR!</h2>
<!-- no2 -->
<?php
$Lheight = array(
    "Andik" => "170",
    "Bany" => "175",
    "Chalie" => "180",
    "Brian" => "185",
    "Woody" => "200"
);

unset($Lheight["Barry"]);
end($Lheight);
echo "Data terakhir setelah penghapusan: " . key($Lheight) . " = " . current($Lheight);
?>


<h2>Buat array baru dengan nama Lweight yang memiliki tiga buah data! Tampilkan data
kedua dari array Lweight!</h2>
<!-- no 3 -->
<?php
// array tinggi badan
$Lheight = array(
    "Andik" => "170",
    "Bany" => "175",
    "Chalie" => "180",
    "Brian" => "185",
    "Woody" => "200"
);

// array berat badan
$Lweight = array(
    "Andik" => 65,
    "Bany" => 70,
    "Chalie" => 75,
    "Brian" => 80,
    "Woody" => 90
);

// Ambil data kedua dari array Lweight
$values = array_values($Lweight);
echo "Data kedua: " . $values[1] . " kg<br><br>";

// Tampilkan seluruh data Lheight
echo "<b>Data Tinggi Badan (Lheight):</b><br>";
foreach($Lheight as $nama => $tinggi) {
    echo "Key=$nama, Value=$tinggi<br>";
}

// Tampilkan seluruh data Lweight
echo "<br><b>Data Berat Badan (Lweight):</b><br>";
foreach($Lweight as $nama => $berat) {
    echo "$nama = $berat kg<br>";
}
?>

<!-- mengunakan for -->
 <h2>Menambahkan lima data baru dalam array Lheight</h2>
<?php
$Lheight = array(
    "Andy"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170",
    "David"=>"180",
    "Edward"=>"168",
    "Fiona"=>"162",
    "George"=>"175",
    "Helen"=>"169"
);

foreach($Lheight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}
?>


 <h2>Buat array baru Lweight dan tampilkan dengan for</h2>

<?php
$Lweight = array(
    "Andy"=>70,
    "Barry"=>65,
    "Charlie"=>68
);

foreach($Lweight as $nama => $berat) {
    echo "Key=" . $nama . ", Value=" . $berat . "<br>";
}
?>




</body>
</html>