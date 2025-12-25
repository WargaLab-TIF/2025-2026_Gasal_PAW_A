<?php
$tingkatan = [
    'kasir' => 2,
    'manager'=> 1,
    'gudang'=> 3,
    'user'=>4
];
function tinkatan($str,$arr_level){
    foreach ($arr_level as $key => $value) {
        if ($key === $str) {
            return $value;
        }
    }
}
?>