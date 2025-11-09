<?php
$input_email = "  Admin@Contoh.com   "; 
$email_yang_diharapkan = "admin@contoh.com";

$email_clean_1 = trim($input_email);

$email_final = strtolower($email_clean_1);

echo "1. String: Input asli: '$input_email'<br>";
echo "2. String: Setelah trim & strtolower: '$email_final'<br>";

if ($email_final === $email_yang_diharapkan) {
    echo "2. String: Email cocok dan valid.<br>";
} else {
    echo "2. String: Email TIDAK cocok.<br>";
}

$kode_booking = "ax34b";
$kode_final = strtoupper($kode_booking);
echo "2. String: Kode booking diformat: $kode_final<br>";
?>