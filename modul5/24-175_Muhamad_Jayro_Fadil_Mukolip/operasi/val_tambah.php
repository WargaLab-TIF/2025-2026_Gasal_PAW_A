<?php
session_start();
require "../conn.php";
require "val_input.php";

$_SESSION['errors'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nama = $_POST['Nama'];
    $tlp = $_POST['telpon'];
    $almt = $_POST['alamat'];

    validateName($_SESSION['errors'], $_POST, 'Nama');
    validateTelpon($_SESSION['errors'], $_POST, 'telpon');
    validateAlamat($_SESSION['errors'], $_POST, 'alamat');

    if (!empty($_SESSION['errors'])) {
        $_SESSION['data_lama'] = $_POST;
        header("Location: ../tindakan/tambah.php");
        exit();
    }

    
    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$tlp', '$almt')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>