<?php

// 🔹 Validasi Nama (alfabet saja)
function validateName(&$errors, $data, $field) {
    $pattern = "/^[a-zA-Z ]+$/";
    if (empty($data[$field])) {
        $errors[$field] = "Nama wajib diisi.";
    } elseif (!preg_match($pattern, $data[$field])) {
        $errors[$field] = "Nama hanya boleh huruf.";
    }
}

// 🔹 Validasi Email (regex + filter)
function validateEmail(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "Email wajib diisi.";
    } elseif (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
        $errors[$field] = "Format email tidak valid.";
    }
}

// 🔹 Validasi Password (panjang minimal dan huruf besar + angka)
function validatePassword(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "Password wajib diisi.";
    } elseif (strlen($data[$field]) < 8) {
        $errors[$field] = "Password minimal 8 karakter.";
    } elseif (!preg_match('/[A-Z]/', $data[$field]) || !preg_match('/[0-9]/', $data[$field])) {
        $errors[$field] = "Password harus mengandung huruf besar dan angka.";
    }
}

// 🔹 Validasi NIM (numerik 8–12 digit)
function validateNIM(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "NIM wajib diisi.";
    } elseif (!preg_match('/^[0-9]{8,12}$/', $data[$field])) {
        $errors[$field] = "NIM harus angka (8–12 digit).";
    }
}

// 🔹 Validasi Umur (integer 17–100)
function validateUmur(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "Umur wajib diisi.";
    } elseif (!is_numeric($data[$field]) || $data[$field] < 17 || $data[$field] > 100) {
        $errors[$field] = "Umur harus angka antara 17–100.";
    }
}

// 🔹 Validasi IPK (float antara 0.00–4.00)
function validateIPK(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "IPK wajib diisi.";
    } elseif (!filter_var($data[$field], FILTER_VALIDATE_FLOAT)) {
        $errors[$field] = "IPK harus berupa angka desimal.";
    } elseif ($data[$field] < 0 || $data[$field] > 4) {
        $errors[$field] = "IPK harus antara 0.00–4.00.";
    }
}

// 🔹 Validasi Tanggal Lahir (valid date)
function validateTanggalLahir(&$errors, $data, $field) {
    if (empty($data[$field])) {
        $errors[$field] = "Tanggal lahir wajib diisi.";
    } else {
        $parts = explode('-', $data[$field]);
        if (!checkdate($parts[1], $parts[2], $parts[0])) {
            $errors[$field] = "Tanggal lahir tidak valid.";
        }
    }
}

// 🔹 Validasi Alamat (minimal 5 huruf)
function validateAlamat(&$errors, $data, $field) {
    if (empty(trim($data[$field]))) {
        $errors[$field] = "Alamat wajib diisi.";
    } elseif (strlen(trim($data[$field])) < 5) {
        $errors[$field] = "Alamat terlalu pendek.";
    }
}

?>
