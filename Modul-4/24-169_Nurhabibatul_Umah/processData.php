<?php
require 'validate.inc';
$errors = array();

validateName($errors, $_POST, 'surname');
validateEmail($errors, $_POST, 'email');

if ($errors) {
    echo 'Errors:<br/>';
    foreach ($errors as $field => $error)
        echo "$field $error<br/>";
} else {
    echo 'Data OK!';
}
?>
