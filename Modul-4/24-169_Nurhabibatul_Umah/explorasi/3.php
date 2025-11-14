<?php
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Email valid";
else
    echo "Email tidak valid";
?>