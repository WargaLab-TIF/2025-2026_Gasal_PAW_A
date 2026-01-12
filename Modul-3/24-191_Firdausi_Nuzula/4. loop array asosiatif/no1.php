<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "<b>Array awal : <br></b>" ;
foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

$height["Uqi"] = "180";
$height["Amin"] = "168";
$height["Adib"] = "160";
$height["Azka"] = "172";
$height["Hasbul"] = "166";

echo "<br><b>Array setelah ditambah  : </b><br>" ;
foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>
