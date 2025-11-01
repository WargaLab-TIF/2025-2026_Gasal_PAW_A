<?php

require "./validate.inc";

if (validateName($_POST, 'surname')) {
  echo 'Data OK!';
} else {
  echo 'Data invalid!';
}

?>
<!DOCTYPE html> 
<html lang="en">
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-
scale=1.0"> 
  <title>Posted Data</title> 
</head> 
<body> 
  <h3>Posted Data</h3> 
  <?php foreach ($_POST as $key => $value) { 
    echo "($key) => ($value) <br>"; 
  } ?> 
</body> 
</html>
