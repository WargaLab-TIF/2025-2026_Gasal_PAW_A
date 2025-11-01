<?php
function validateName($field_list, $field_name)
{
    // Cek apakah field ada dan tidak kosong
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name])))
        return true;

    // Pola regex untuk huruf alfabet dan tanda penghubung
    $pattern = "/^[a-zA-Z'-]+$/";

    if (!preg_match($pattern, $field_list[$field_name]))
        return false;

    // Kalau semua valid
    return true;
}
?>