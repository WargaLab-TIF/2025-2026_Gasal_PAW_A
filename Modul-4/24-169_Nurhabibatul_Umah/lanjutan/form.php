<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';

    validateName($errors, $_POST, 'nama');
    validateNIM($errors, $_POST, 'nim');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        echo "<h3>Terjadi kesalahan, periksa input berikut:</h3>";
        foreach ($errors as $field => $error)
            echo "$field: $error<br>";
        echo "<hr>";
        include 'form.inc'; 
    } else {
        echo "<h3>Data berhasil dikirim!</h3>";
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "NIM: " . $_POST['nim'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
    }
} else {
    include 'form.inc'; 
}
?>
