<?php
function validateName($name) {
    return preg_match("/^[a-zA-Z ]+$/", $name);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    return strlen($password) >= 8;
}

function validateUsia($usia) {
    return is_numeric($usia);
}
?>