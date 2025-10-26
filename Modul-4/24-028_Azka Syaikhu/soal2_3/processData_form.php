<!DOCTYPE html>
<html>
<head>
    <title>Form dengan Self-Submission</title>
</head>
<body>
    <h2>Form Self-Submission</h2>
    
    <?php
    $errors = array();
    
    if (isset($_POST['name'])) {
        require 'validate.inc';
        
        validateName($errors, $_POST, 'name');
        validateEmail($errors, $_POST, 'email');
        
        if ($errors) {
            echo '<h1>Invalid, correct the following errors:</h1>';
            include 'form.inc';
        } else {
            echo '<h1>Form submitted successfully with no errors</h1>';
            echo '<h3>Data yang dikirim:</h3>';
            echo '<p><a href="processData_form.php">Kembali ke Form</a></p>';
        }
    } else {
        include 'form.inc';
    }
    ?>
</body>
</html>


