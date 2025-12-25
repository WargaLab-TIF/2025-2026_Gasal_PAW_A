<?php

#array index
echo 'pakai foreach <br>';
$array_index = array('array0', 'array1', 'array2');
foreach ($array_index as $key) {
    echo $key . '<br>';
}
echo 'pakai for <br>';
for ($i = 0; $i < count($array_index); $i++) {
    echo $array_index[$i] . '<br>';
}

#array asosiatif
$array_asosiatif = array('satu' => 'array1', 'dua' => 'array2', 'tiga' => 'array3');
foreach ($array_asosiatif as $key => $value) {
    echo 'key : ' . $key . ', value : ' . $value . '<br>';
}

#array multidimensi
$array_multidimensi = array(
    array('array0', 'array1', 'array2'),
    array('satu' => 'array1', 'dua' => 'array2', 'tiga' => 'array3')
);
foreach ($array_multidimensi as $key) {
    echo "array ke-" . $key;
    foreach ($key as $kunci) {
        echo $kunci . '<br>';
    }
}
;

echo '<br>';
echo 'pakai print_r <br>';
echo '<br>';
print_r($array_asosiatif);
echo '<br>';
print_r($array_multidimensi);
echo '<br>';
print_r($array_index);
echo '<br>';
echo 'pakai var_dump <br>';
echo '<br>';
var_dump($array_index);
echo '<br>';
var_dump($array_asosiatif);
echo '<br>';
var_dump($array_multidimensi);
echo '<br>';

#hapus dan tambah array index
echo '<br>';
$array_index[] = 'array3';
var_dump($array_index);
echo '<br>';
$array_index[1] = 'array1_update';
var_dump($array_index);
echo '<br>';
// array_splice($array_index, 1, 1);
// unset($array_index[1]);
var_dump($array_index);
echo '<br>';
$array_index += array('array4');
var_dump($array_index);
echo '<br>';

#hapus dan tambah array asosiatif
echo '<br>';
$array_asosiatif['empat'] = 'array4';
var_dump($array_asosiatif);
echo '<br>';
$array_asosiatif['dua'] = 'array2_update';
var_dump($array_asosiatif);
echo '<br>';
array_splice($array_asosiatif, 1, 1);
// unset($array_asosiatif['dua']);
var_dump($array_asosiatif);
echo '<br>';
$array_asosiatif += array('empat' => 'array4');
var_dump($array_asosiatif);
echo '<br>';

#hapus dan tambah array multidimensi
echo '<br>';
$array_multidimensi[0][] = 'array3';
var_dump($array_multidimensi);
echo '<br>';
$array_multidimensi[1]['empat'] = 'array4';
var_dump($array_multidimensi);
echo '<br>';
unset($array_multidimensi[1]['dua']);
var_dump($array_multidimensi);
echo '<br>';

#array hapus awal dan akhir
echo '<br>';
$simpan1 = array_shift($array_index);
var_dump($array_index);
echo '<br>';
$array2 = array_pop($array_index);
var_dump($array_index);
echo '<br>';


echo 'simpan1 : ' . $simpan1 . '<br>';
echo 'array2 : ' . $array2 . '<br>';


