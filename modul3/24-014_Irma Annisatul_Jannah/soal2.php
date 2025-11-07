<?php
 // Skrip dasar untuk panjang array dan akses menggunakan FOR loop
 $fruits = array("Avocado", "Blueberry", "Cherry");
 $arrlength = count($fruits);
 for($x = 0; $x < $arrlength; $x++) {
 echo $fruits[$x];
 echo "<br>";
}
 ?>