<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    

    <?php
    $errors = array();
    
    if (isset($_POST['name'])) {
        require 'validate.inc';
        
        validateName($errors, $_POST, 'name');
        
        if ($errors) {
            echo '<h1>Invalid, correct the following errors:</h1>';
            foreach ($errors as $field => $error) {
                echo "$field $error</br>";
            }
            
            include 'form.inc';
        } else {
            echo 'Form submitted successfully with no errors';
            
        }
    } else {
        
        include 'form.inc';
    }
    ?>
</body>
</html>