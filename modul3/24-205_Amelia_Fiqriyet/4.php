<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

// SOAL 1
// Tambah 5 data baru
$height["David"] = "180";
$height["Edward"] = "168";
$height["Frank"] = "172";
$height["George"] = "178";
$height["Harry"] = "169";

// Tampilkan seluruh data dengan foreach
echo "Isi array Lheight setelah penambahan 5 data baru:<br>";
foreach ($height as $key => $value) {
    echo "Key = " . $key . ", Value = " . $value . " cm<br>";
}

// SOAL 2
// membuat array baru 
$Lweight = array(60, 65, 70);

$arrlength = count($Lweight); // hitung panjang array

// Tampilkan seluruh data dengan perulangan FOR
echo "<br>";
echo "Isi array Lweight:<br>";
for ($i = 0; $i < $arrlength; $i++) {
    echo "Data ke-" . $i . " = " . $Lweight[$i] . " kg<br>";
}
?>
