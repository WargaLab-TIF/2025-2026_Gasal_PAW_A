<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='penjualan';
$conn = mysqli_connect($hostname, $username, $password, $dbname);

$id = $_GET['id'];
$delete = "DELETE FROM supplier WHERE id='$id'";

if (mysqli_query($conn, $delete)) {
    header("Location: config.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
