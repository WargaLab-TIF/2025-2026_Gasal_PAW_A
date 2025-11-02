<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TPP5"; // Sesuaikan dengan nama database Anda

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>