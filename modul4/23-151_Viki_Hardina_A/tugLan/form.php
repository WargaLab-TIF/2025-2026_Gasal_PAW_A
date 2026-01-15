<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';

    validateName($errors, $_POST, 'nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateNIM($errors, $_POST, 'nim');
    validateUmur($errors, $_POST, 'umur');
    validateIPK($errors, $_POST, 'ipk');
    validateTanggalLahir($errors, $_POST, 'tanggal_lahir');
    validateAlamat($errors, $_POST, 'alamat');

    if ($errors) {
        echo "<h3 style='color:red'>❌ Terdapat kesalahan pada inputan:</h3>";
        include 'form.inc';
    } else {
        echo "<h2 style='color:green'>✅ Data mahasiswa berhasil dikirim!</h2>";
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>
