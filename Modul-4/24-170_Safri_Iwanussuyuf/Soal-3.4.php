<?php
$umur = 25;           
$harga = 49.99;       
$id_user = "123";    
$nama = "Siti";      

// Cek is_int()
if (is_int($umur)) {
    echo "4. Type: 'umur' (25) adalah integer.<br>";
}
if (!is_int($id_user)) {
    echo "4. Type: 'id_user' ('123') BUKAN integer (karena tipe-nya string).<br>";
}

// Cek is_float()
if (is_float($harga)) {
    echo "4. Type: 'harga' (49.99) adalah float.<br>";
}

// Cek is_string()
if (is_string($nama)) {
    echo "4. Type: 'nama' ('Siti') adalah string.<br>";
}

// Cek is_numeric() (Paling berguna untuk form)
if (is_numeric($id_user)) {
    echo "4. Type: 'id_user' ('123') adalah numerik.<br>";
}
if (is_numeric($harga)) {
    echo "4. Type: 'harga' (49.99) adalah numerik.<br>";
}
if (!is_numeric($nama)) {
    echo "4. Type: 'nama' ('Siti') BUKAN numerik.<br>";
}
?>