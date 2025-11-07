<?php
require 'soal1.php';

if (!isset($_GET['id'])) {
    header("Location: 1.1.php");
    exit;
}

$id = $_GET['id'];

// hapus data supplier sesuai id
mysqli_query($conn, "DELETE FROM supplier WHERE id = $id");

mysqli_close($conn);
header("Location: 1.1.php");
exit;
?>
