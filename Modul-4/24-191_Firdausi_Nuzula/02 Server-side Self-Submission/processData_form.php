<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'validate.inc';

  validateName($errors, $_POST, 'surname');
  validateEmail($errors, $_POST, 'email');
  validatePassword($errors, $_POST, 'passwd');
  validateAddress($errors, $_POST, 'address');
  validateState($errors, $_POST, 'state');
  validateCountry($errors, $_POST, 'country');

  if ($errors) {
    echo '<h1>Invalid, correct the following errors:</h1>';
    foreach ($errors as $field => $error)
      echo "<p style='color:red;'>$error</p>";
    include 'form.inc';
  } else {
    echo '<h1>Form submitted successfully!</h1>';
    echo '<p style="color:green;">All inputs are valid.</p>';
  }
} else {
  include 'form.inc';
}

?>
