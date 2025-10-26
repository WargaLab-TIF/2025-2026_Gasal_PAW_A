<?php
function validateNama(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z\s'-]+$/";
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Invaldi (Hanya huruf ya sayang  ya)';
    }
}

function validateEmaill(&$errors, $field_list, $field_name)
{
    $email = trim($field_list[$field_name]);
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (empty($email)) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, $email)) {
        $errors[$field_name] = 'Invaldi email format';
    }
}

function validatePass(&$errors, $field_list, $field_name)
{
    $password = $field_list[$field_name];
    if (empty($password)) {
        $errors[$field_name] = 'required';
    } elseif (strlen($password) < 6) {
        $errors[$field_name] = 'Kependekan ngab (min 6 char)';
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors[$field_name] = 'Etlis kasih huruf gede satu';
    }
}

function validateNIM(&$errors, $field_list, $field_name)
{
    $nim = trim($field_list[$field_name]);
    if (empty($nim)) {
        $errors[$field_name] = 'required';
    } elseif (!is_numeric($nim)) {
        $errors[$field_name] = 'Harus angka looo';
    } elseif (strlen($nim) != 12) {
        $errors[$field_name] = 'Harus 12 digit nih';
    }
}
?>