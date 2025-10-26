<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (!preg_match($pattern, $field_list[$field_name]))
        $errors[$field_name] = 'invalid';
}
function validateEmail(&$errors, $data, $field) {
    if (empty($data[$field]))
        $errors[$field] = "Email wajib diisi";
    else if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL))
        $errors[$field] = "Format email tidak valid";
}
?>
