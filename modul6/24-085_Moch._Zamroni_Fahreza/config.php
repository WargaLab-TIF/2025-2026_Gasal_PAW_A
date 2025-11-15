<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "db_penjualan";

$conn = mysqli_connect($host, $user, $pass, $dbName);
if($conn){
  // echo "konek";
}else{
  die("Koneksi Error: " . mysqli_connect_error());
}
?>