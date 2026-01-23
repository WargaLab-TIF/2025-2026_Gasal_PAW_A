<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan bersihkan data, termasuk ID
    $id = (int)$_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    if (empty($nama) || empty($telp) || empty($alamat)) {
        header('Location: list_supplier.php?msg=' . urlencode('Error: Semua field wajib diisi.'));
        exit;
    }

    $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header('Location: list_supplier.php?msg=' . urlencode('Supplier berhasil diupdate!'));
    } else {
        header('Location: list_supplier.php?msg=' . urlencode('Error: Gagal mengupdate data. ' . mysqli_error($conn)));
    }
} else {
    header('Location: list_supplier.php');
}

mysqli_close($conn);
exit;
?>