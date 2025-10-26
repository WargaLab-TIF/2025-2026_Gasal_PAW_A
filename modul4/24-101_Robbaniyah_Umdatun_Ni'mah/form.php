<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'passwd');
    validateState($errors, $_POST, 'state');

    if ($errors) {
        echo '<h1>Invaldi, ubah errornya ngab:</h1>';
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>$field : $error</p>";
        }

        include 'form.inc';
    } else {
        echo '<p><strong>Form submitted successfully with no errors!</strong></p>';
    }
} else {
    include 'form.inc';
}
?>
