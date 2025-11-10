<?php
session_start();

function validateName(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z'. -]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    }
    else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
    }
}

function validateAlamat(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } 
}

function validateTelpon(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    }
    
    elseif (strlen($field_list[$field_name]) != 11) {
        $errors[$field_name] = 'Nomor telpon harus 12 digit';
    }
}
?>