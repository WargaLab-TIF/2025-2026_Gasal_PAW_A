<?php
require 'validate.inc';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nama']) || !validateName($_POST['nama'])) {
        $errors['nama'] = "Nama tidak valid";
    }

    if (!validateEmail($_POST['email'])) {
        $errors['email'] = "Format email salah";
    }

    if (!validatePassword($_POST['password'])) {
        $errors['password'] = "Password minimal 8 karakter";
    }

    if (!validateUsia($_POST['usia'])) {
        $errors['usia'] = "Usia harus angka";
    }

    if (empty($errors)) {
        echo "Data valid dan siap diproses!";
    } else {
        foreach ($errors as $field => $err) {
            echo "$field: $err <br>";
        }
    }
}
?>