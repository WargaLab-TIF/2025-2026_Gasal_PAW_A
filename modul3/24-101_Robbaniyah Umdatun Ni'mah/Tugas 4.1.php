<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170", "Nia"=>"153", "Kaila"=>"161");

// Tidak, saya tidak perlu mengubah struktur dari perulangan 
// karena foreach itu akan otomatis mengikuti panjang dari array yang di iterasi

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>