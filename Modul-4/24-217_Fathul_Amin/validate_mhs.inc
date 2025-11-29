<?php
function validateNameMhs(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-. ]+$/"; 
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'Nama wajib diisi';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Nama hanya boleh berisi huruf dan spasi';
    }
}

function validateNIM(&$errors, $field_list, $field_name) {
    $pattern = "/^[0-9]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'NIM wajib diisi';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'NIM hanya boleh berisi angka';
    }
}

function validateEmailMhs(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'Email wajib diisi';
    } else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid';
    }
}

function validatePasswordMhs(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'Password wajib diisi';
    } else if (strlen($field_list[$field_name]) < 8) {
        $errors[$field_name] = 'Password minimal harus 8 karakter';
    }
}
?>
