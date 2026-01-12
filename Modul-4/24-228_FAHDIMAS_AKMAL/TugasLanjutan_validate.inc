<?php
//
function validateName(&$errors, $field_list, $field_name) {
$pattern = "/^[a-zA-Z'-]+$/";
if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
$errors[$field_name] = 'Nama wajib diisi';
else if (!preg_match($pattern, $field_list[$field_name]))
$errors[$field_name] = 'Format nama tidak valid';
}
//
function validateEmail(&$errors, $field_list, $field_name) {
if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
$errors[$field_name] = 'Email wajib diisi';
}
//
else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
$errors[$field_name] = 'Format email tidak valid';
}
}
//
function validatePassword(&$errors, $field_list, $field_name) {
if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
$errors[$field_name] = 'Password wajib diisi';
}
//
else if (strlen($field_list[$field_name]) < 8) {
$errors[$field_name] = 'Password minimal 8 karakter';
}
}
//
function showError(&$errors, $field_name) {
if (isset($errors[$field_name])) {
echo '<span style="color: red; font-size: 0.9em;">' . $errors[$field_name] . '</span>';
}
}
//
function showValue($field_name) {
if (isset($_POST[$field_name])) {
echo htmlspecialchars($_POST[$field_name]); //
}
}
?>