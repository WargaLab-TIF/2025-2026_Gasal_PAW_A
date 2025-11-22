<?php
function vall_username($name, &$errors)
{
    if (empty($name) && isset($name)) {
        $errors['username'] = 'tidak boleh kosong';
    } else if (strlen($name) < 4) {
        $errors['username'] = 'minimal 4 karakter';
    }
}

function vall_password($name, &$errors)
{
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])$/';
    if (empty($name) && isset($name)) {
        $errors['password'] = 'tidak boleh kosong';
    } else if (preg_match($pattern, $name)) {
        $errors['password'] = 'kurang kuat, silahkan isi lagi';
    } else if (strlen($name) <= 8) {
        $errors['password'] = 'minimal 8 karakter';
    }
}

function vall_name($name, &$errors)
{
    $pattern = "/^[a-zA-Z' -]+$/";
    if (empty($name) && isset($name)) {
        $errors['name'] = 'tidak boleh kosong';
    } else if (!preg_match($pattern, $name)) {
        $errors['name'] = 'hanya boleh mengandung huruf, spasi, tanda petik dan strip';
    } else if (strlen($name) <= 6) {
        $errors['name'] = 'minimal 6 karakter';
    }
}

function vall_hp($name, &$errors)
{
    if (empty($name) && isset($name)) {
        $errors['hp'] = 'tidak boleh kosong';
    } else if (strlen($name) != 12) {
        $errors['hp'] = 'hanya boleh 12 digit';
    }
}

?>