<?php
$email = "test@example.com";
$email_salah = "inbukanemail.com";
$url = "https://www.google.com";
$angka_float = "123.45";
$ip = "127.0.0.1";
$ip_salah = "999.999.999.999";

// 1. Validasi Email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "3. Filter: '$email' adalah email valid.<br>";
} else {
    echo "3. Filter: '$email' adalah email TIDAK valid.<br>";
}

if (filter_var($email_salah, FILTER_VALIDATE_EMAIL)) {
    echo "3. Filter: '$email_salah' adalah email valid.<br>";
} else {
    echo "3. Filter: '$email_salah' adalah email TIDAK valid.<br>";
}

// 2. Validasi URL
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "3. Filter: '$url' adalah URL valid.<br>";
}

// 3. Validasi Float
if (filter_var($angka_float, FILTER_VALIDATE_FLOAT)) {
    echo "3. Filter: '$angka_float' adalah float valid.<br>";
}

// 4. Validasi IP
if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "3. Filter: '$ip' adalah IP valid.<br>";
}

if (filter_var($ip_salah, FILTER_VALIDATE_IP)) {
    echo "3. Filter: '$ip_salah' adalah IP valid.<br>";
} else {
    echo "3. Filter: '$ip_salah' adalah IP TIDAK valid.<br>";
}

?>