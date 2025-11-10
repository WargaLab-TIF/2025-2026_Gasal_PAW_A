<?php
$buah = ['jambu','pisang','mangga'];

$hasil_filter = array_filter($buah, function($x){
    return $x == 'jambu';
});
print_r($hasil_filter);