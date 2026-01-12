<?php
//
$errors = array();
require 'validate.inc'; //
//
if (isset($_POST['surname'])) //
{
validateName($errors, $_POST, 'given_name'); //
validateName($errors, $_POST, 'surname'); //
if ($errors) //
{
// JIKA ADA ERROR
echo '<h1>Invalid, correct the following errors:</h1>';

include 'form.inc'; //
}
else
{
// JIKA TIDAK ADA ERROR
echo 'Form submitted successfully with no errors';
}
}
else
{
include 'form.inc'; //
}
?>