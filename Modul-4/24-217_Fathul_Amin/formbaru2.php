<?php
$errors = array();
if (isset($_POST['surname']))
{
    require 'validateBaru.inc'; 
    validateName($errors, $_POST, 'surname'); 
    
    if ($errors)
    {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) 
            echo "$field $error</br>"; 
        
        include 'formBaru.inc';
    }
    else
    {
        echo 'Form submitted successfully with no errors'; 
    }
}
else
{

    include 'formBaru.inc';
}
?>