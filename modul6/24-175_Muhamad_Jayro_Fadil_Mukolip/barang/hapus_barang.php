<?php
require "../conn.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM barang WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: barang.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: barang.php");
    exit();
}
?>