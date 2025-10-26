<?php
$name = "Habiba";
if (preg_match("/^[a-zA-Z'-]+$/", $name))
    echo "Nama valid";
else
    echo "Nama tidak valid";
?>