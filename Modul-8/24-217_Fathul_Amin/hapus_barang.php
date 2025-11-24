<?php
include 'config.php';

$id = $_GET['id'];
$supplier_id = $_GET['supplier_id'];

mysqli_query($conn, "DELETE FROM barang WHERE id=$id");
header("Location: supplier_detail.php?id=$supplier_id");
?>