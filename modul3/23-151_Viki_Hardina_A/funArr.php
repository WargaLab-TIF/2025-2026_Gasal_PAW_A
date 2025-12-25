<?php
$arr1 = array("apple", "banana");
$arr2 = array("cherry", "durian");

// array_push
array_push($arr1, "mango");
echo "<b>Hasil array_push:</b><br>";
print_r($arr1);
echo "<br><br>";

// array_merge
$merged = array_merge($arr1, $arr2);
echo "<b>Hasil array_merge:</b><br>";
print_r($merged);
echo "<br><br>";

// array_values
echo "<b>Hasil array_values:</b><br>";
print_r(array_values($merged));
echo "<br><br>";

// array_search
echo "<b>Hasil array_search:</b><br>";
echo "Posisi durian: " . array_search("durian", $merged);
echo "<br><br>";

// array_filter
echo "<b>Hasil array_filter (panjang > 5 huruf):</b><br>";
$result = array_filter($merged, function($v) {
    return strlen($v) > 5;
});
print_r($result);
echo "<br><br>";


// sorting
echo "<b>Hasil sorting (A–Z):</b><br>";
sort($merged);
print_r($merged);
echo "<br><br>";
?>
