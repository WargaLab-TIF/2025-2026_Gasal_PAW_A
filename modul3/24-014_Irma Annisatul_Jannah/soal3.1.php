<?php
//Skripdasaruntukdeklarasi dan akses array asosiatif
$Lheight=array("Andy"=> "176", "Barry"=> "165", "Charlie"=> "170");
echo"Andy is" . $Lheight ['Andy']." cm tall.<br><br>";
//Pertanyaan3.3.1
//Menambahkan 5 data baruke array $height
//Menampilkan nilai dengan indeks terakhir
$Lheight["Eddy"]="180";
$Lheight["Mohan"]="162";
$Lheight["Oji"]="175";
$Lheight["Killua"]="168";
$Lheight["Harry"]="185";
echo"<strong>Array\$heightsetelah ditambah 5 data:</strong><br>";
var_dump($Lheight);
echo"<br>";
$kunciakhir=array_key_last($Lheight);
$last_value=$Lheight[$kunciakhir];
echo"<strong>Kunci terakhir:</strong> " . $kunciakhir ."<br>";
echo"<strong>Nilai dengan indeks terakhir:</strong> ". $last_value .
"cm<br>";
echo"<strong>Pesan lengkap:</strong> ". $kunciakhir . " is " .
$last_value."cmtall.<br><br>";

//Pertanyaan3.3.2
//Menghapus 1 data tertentu dari array $height
//Menampilkan nilai dengan indeks terakhir setelah penghapusan
$keyremoved="Oji";
$removed_value=$Lheight[$keyremoved];
unset($Lheight[$keyremoved]);
echo"<strong>Data yang dihapus:</strong> " . $keyremoved . "(" .
$removed_value."cm)<br>";
echo"<strong>Array\$height setelah dihapus 1 data:</strong><br>";
var_dump($Lheight);
echo"<br>";
$last_key_after=array_key_last($Lheight);
$last_value_after=$Lheight[$last_key_after];
echo"<strong>Kunci terakhir setelah penghapusan:</strong> " .
$last_key_after."<br>";
echo"<strong>Nilai dengan indeks terakhir setelah
penghapusan:</strong>". $last_value_after . " cm<br>";
echo"<strong>Pesan lengkap:</strong> ". $last_key_after ." is " .
$last_value_after."cmtall.<br><br>";

//Pertanyaan3.3.3
//Membuatarraybaru$weight dengan 3 data
//Menampilkandatake-2dari array $weight
$weight=array("Alice"=>"55","Bob"=>"70", "Carol"=>"62");
var_dump($weight);
echo"<br>";
$keys=array_keys($weight);
$second_key=$keys[1];//Indeks 1 untuk data ke-2
$second_value=$weight[$second_key];
echo"<strong>Data ke-2 dari array \$weight:</strong><br>";
echo"<strong>Kunci:</strong>" . $second_key . "<br>";
echo"<strong>Nilai:</strong>" . $second_value ." kg<br>";
echo"<strong>Pesanlengkap:</strong> ". $second_key . " weighs " .
$second_value."kg<br><br>";
?>