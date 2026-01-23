<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    if (empty($nama) || empty($telp) || empty($alamat)) {
        header('Location: list_supplier.php?msg=' . urlencode('Error: Semua field wajib diisi.'));
        exit;
    }


    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        header('Location: list_supplier.php?msg=' . urlencode('Supplier berhasil ditambahkan!'));
    } else {
        header('Location: list_supplier.php?msg=' . urlencode('Error: Gagal menambahkan data. ' . mysqli_error($conn)));
    }
} else {
    header('Location: list_supplier.php');
}

mysqli_close($conn);
exit;
?>