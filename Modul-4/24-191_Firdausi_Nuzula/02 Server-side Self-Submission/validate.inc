<?php

function validateName(&$errors, $field_list, $field_name) {
  $pattern = "/^[a-zA-Z'-]+$/";
  if (empty($field_list[$field_name]))
    $errors[$field_name] = 'Surname is required';
  else if (!preg_match($pattern, $field_list[$field_name]))
    $errors[$field_name] = 'Surname must contain only letters';
}

function validateEmail(&$errors, $field_list, $field_name) {
  if (empty($field_list[$field_name]))
    $errors[$field_name] = 'Email is required';
  else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL))
    $errors[$field_name] = 'Invalid email format';
}

function validatePassword(&$errors, $field_list, $field_name) {
  if (empty($field_list[$field_name]))
    $errors[$field_name] = 'Password is required';
  else if (strlen($field_list[$field_name]) < 8)
    $errors[$field_name] = 'Password must be at least 8 characters';
}

function validateAddress(&$errors, $field_list, $field_name) {
  if (empty($field_list[$field_name]))
    $errors[$field_name] = 'Address cannot be empty';
}

function validateState(&$errors, $field_list, $field_name) {
  if ($field_list[$field_name] == "1")
    $errors[$field_name] = 'Please select a state';
}

function validateCountry(&$errors, $field_list, $field_name) {
  if (empty($field_list[$field_name]))
    $errors[$field_name] = 'Country cannot be empty';
}
?>