<?php
$errors = array();
require 'validateno9.inc';

if (isset($_POST['surname']))
{
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    
    if ($errors)
    {
        echo '<h1>Invalid, correct the following errors:</h1>';
        include 'formno9.inc';
    }
    else
    {
        echo 'Form submitted successfully with no errors';
    }
}
else
{
    include 'formno9.inc';
}
?>
