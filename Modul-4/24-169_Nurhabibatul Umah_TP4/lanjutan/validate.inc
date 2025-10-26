<?php
// Validasi Nama (huruf dan spasi)
function validateName(&$errors, $data, $field) {
    $pattern = "/^[a-zA-Z ]+$/";
    if (empty($data[$field]))
        $errors[$field] = "Nama wajib diisi";
    else if (!preg_match($pattern, $data[$field]))
        $errors[$field] = "Nama hanya boleh huruf dan spasi";
}

// Validasi Email
function validateEmail(&$errors, $data, $field) {
    if (empty($data[$field]))
        $errors[$field] = "Email wajib diisi";
    else if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL))
        $errors[$field] = "Format email tidak valid";
}

// Validasi Password 
function validatePassword(&$errors, $data, $field) {
    if (empty($data[$field]))
        $errors[$field] = "Password wajib diisi";
    else if (strlen($data[$field]) < 8)
        $errors[$field] = "Password minimal 8 karakter";
}

// Validasi NIM (hanya angka)
function validateNIM(&$errors, $data, $field) {
    if (empty($data[$field]))
        $errors[$field] = "NIM wajib diisi";
    else if (!preg_match("/^[0-9]+$/", $data[$field]))
        $errors[$field] = "NIM hanya boleh angka";
}
?>
