<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validateMhs.inc';

    validateNama($errors, $_POST, 'nama');
    validateEmaill($errors, $_POST, 'email');
    validatePass($errors, $_POST, 'password');
    validateNIM($errors, $_POST, 'nim');

    if ($errors) {
        echo '<h2 style="color:red;">Invaldiii, Ayo Benerin Errornya:</h2>';
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>$field : $error</p>";
        }
        include 'formMhs.inc';
    } else {
        echo '<h2 style="color:green;">Horee, Data Mahasiswa Berhasil Dikirim!</h2>';
        echo '<pre>';
        foreach ($_POST as $key => $value) {
            echo "$key : $value\n";
        }
        echo '</pre>';
    }
} else {
    include 'formMhs.inc';
}
?>