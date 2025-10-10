<?php
$buah = ['jambu', 'pisang', 'mangga', 'semangka'];

#array_search
if (array_search("pisang", $buah)) {
    echo "pisang di array";
} else {
    echo "pisang kosong.";
}

echo "<br>";


#in_array
if (in_array("pisang", $buah)) {
    echo "pisang di array";
} else {
    echo "pisang kosong.";
}