
<?php

$hostname="localhost";
$username='root';
$password="";
$db="databaru";

$conn=mysqli_connect($hostname,$username,$password,$db);

if (!$conn){
    echo "connect error ". mysqli_error();
}
?>
