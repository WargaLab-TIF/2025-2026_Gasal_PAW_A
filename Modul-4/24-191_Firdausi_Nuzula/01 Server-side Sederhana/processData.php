<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Process Data</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <fieldset>
      <h3>Posted data:</h3>
<?php

  require 'validate.inc';
  $errors = array();

  validateName($errors, $_POST, 'surname');

  if ($errors) {
      echo 'Errors:<br/>';
      foreach ($errors as $field => $error)
          echo "$field $error</br>";
  } else {
      echo 'Data OK!';
  }

    foreach ($_POST as $key => $value) {
        echo "($key) => ($value)<br>";
    }
?>
    </fieldset>
  </div>
</body>
</html>
