<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Ambil dan bersihkan ID
    $id = (int)$_POST['id'];

    // Query DELETE
    $sql = "DELETE FROM supplier WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header('Location: list_supplier.php?msg=' . urlencode('Supplier berhasil dihapus!'));
    } else {
        header('Location: list_supplier.php?msg=' . urlencode('Error: Gagal menghapus data. ' . mysqli_error($conn)));
    }
} else {
    header('Location: list_supplier.php');
}

mysqli_close($conn);
exit;
?>