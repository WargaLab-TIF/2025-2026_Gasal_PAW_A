<?php
$weight = array("Firda"=>"76", "Nuzula"=>"65", "Zula"=>"70");

echo "<b>Array weight : <br></b>" ;
foreach($weight as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

?>