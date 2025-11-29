<?php
$errors = array();
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate_mhs.inc';
    validateNIM($errors, $_POST, 'nim');
    validateNameMhs($errors, $_POST, 'nama');
    validateEmailMhs($errors, $_POST, 'email');
    validatePasswordMhs($errors, $_POST, 'password');
    
    if ($errors) {
    } else {
        $success_message = '<h3>Registrasi Mahasiswa Berhasil!</h3>';
        $success_message .= "NIM: " . htmlspecialchars($_POST['nim']) . "<br>";
        $success_message .= "Nama: " . htmlspecialchars($_POST['nama']) . "<br>";
        $success_message .= "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        $_POST = array(); 
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Lanjutan - Registrasi Mahasiswa</title>
</head>
<body>
    <h2>Formulir Registrasi Mahasiswa</h2>
    
    <?php 
    if ($success_message) {
        echo "<div style='color:green;'>$success_message</div>";
    }
    include 'form_mhs.inc';
    ?>
    
</body>
</html>
