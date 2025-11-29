<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TP5"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "
CREATE TABLE supplier (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nama VARCHAR(100),
    telp VARCHAR(20),
    alamat TEXT
);
";

if (mysqli_multi_query($conn, $sql)) {
    echo "Semua tabel berhasil dibuat!";
} else {
    echo "Error creating tables: " . mysqli_error($conn);
}

mysqli_close($conn);
?>