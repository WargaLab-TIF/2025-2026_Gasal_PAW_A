<?php
$height = array("Andy" => "176","Barry" => "165", "Charlie" => "170");

// SOAL 1 
// Tambahkan lima data baru ke array Lheight
$height["David"] = "180";
$height["Edward"] = "168";
$height["Frank"] = "172";
$height["George"] = "178";
$height["Harry"] = "169";

// Tampilkan seluruh isi array Lheight
echo "isi array Lheight: <br>";
print_r($height);
echo "<br><br>";

// Karena array asosiatif tidak pakai indeks numerik,
// maka mencari elemen terakhirnya secara manual:
$keys = array_keys($height);
$lastKey = end($keys);
$lastValue = $height[$lastKey];

echo "kunci terakhir dari array Lheight: " . $lastKey . "<br>";
echo "nilai terakhir dari array Lheight: " . $lastValue . " cm<br><br>";

// SOAL 2 
// hapus satu data tertentu dari array Lheight
unset($height["Barry"]);

echo "isi array Lheight setelah menghapus data: <br>";
print_r($height);
echo "<br><br>";

// Cari lagi nilai terakhir setelah penghapusan
$keysAfter = array_keys($height);
$lastKeyAfter = end($keysAfter);
$lastValueAfter = $height[$lastKeyAfter];

echo "Kunci terakhir setelah penghapusan: " . $lastKeyAfter . "<br>";
echo "Nilai terakhir setelah penghapusan: " . $lastValueAfter . " cm<br><br>";

// SOAL 3 
// membuat array baru Lweight (numerik)
$weight = array(60, 65, 70);

// Tampilkan data kedua (ingat: indeks mulai dari 0)
echo "isi array Lweight: <br>";
print_r($weight);
echo "<br><br>";

echo "Data kedua dari array Lweight adalah: " . $weight[1] . " kg";
?>
