<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Modul 4</title>
</head>
<body>

  <?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        echo "<h1>Invalid, correct the following errors:</h1>";
        foreach ($errors as $field => $error)
            echo "$field : $error<br/>";
        include 'form.inc';
    } else {
        echo "<h2>✅ Data OK! Form submitted successfully.</h2>";
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>


</body>
</html>
