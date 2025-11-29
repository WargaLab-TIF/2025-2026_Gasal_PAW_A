<?php
$umur = $_POST['umur'];

if (is_numeric($umur))
    echo "Umur valid";
else
    echo "Umur tidak valid";
?>