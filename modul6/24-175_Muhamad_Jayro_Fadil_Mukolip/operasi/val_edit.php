<?php
session_start();
require "../conn.php";
require "val_input.php";

$_SESSION['errors'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int) $_POST['id'];
    $nama = $_POST['Nama'];
    $tlp = $_POST['telpon'];
    $almt = $_POST['alamat'];

    validateName($_SESSION['errors'], $_POST, 'Nama');
    validateTelpon($_SESSION['errors'], $_POST, 'telpon');
    validateAlamat($_SESSION['errors'], $_POST, 'alamat');

    if (!empty($_SESSION['errors'])) {
        header("Location: ../tindakan/edit.php?id=$id");
        exit();
    } else {
        $sql = "UPDATE supplier SET nama='$nama', telp='$tlp', alamat='$almt' WHERE id=$id";
    
        if (mysqli_query($conn, $sql)) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
?>