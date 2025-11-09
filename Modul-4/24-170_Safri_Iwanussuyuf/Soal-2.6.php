<?php
$errors = array();
if (isset($_POST['submit'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAddress($errors, $_POST, 'address');
    validateState($errors, $_POST, 'state');
    validateGender($errors, $_POST, 'gender');
    if ($errors){
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error)
            echo "$field $error</br>";
        // tampilkan kembali form
        include 'form.inc';
}else{
    echo 'Form submitted successfully with no errors';
}}else
    // tampilkan kembali form
    include 'form.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>

</body>
</html>
