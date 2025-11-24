<?php
include 'conn.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM barang WHERE id=$id");

echo "<script>alert('Data berhasil dihapus'); document.location='data_master.php';</script>";
exit();
?>
