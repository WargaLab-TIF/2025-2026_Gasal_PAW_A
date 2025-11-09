<?php

$hostname="localhost";
$username="root";
$password="";
$database="databaru";

$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn){
    echo "connect error ". mysqli_error();
}

?>
