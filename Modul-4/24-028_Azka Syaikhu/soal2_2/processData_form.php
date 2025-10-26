<!DOCTYPE html>
<html>
<head>
    <title>Proses Data</title>
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
                echo "Field: $field, Status: $error<br/>";
            }
            

            include 'form.inc';
            
        } else {

            echo 'Form submitted successfully with no errors';
            echo "<h2>Data Mahasiswa:</h2>";
            echo "<p>Nama: " . ($_POST['name']) . "</p>";
            echo "<p>NIM: " . ($_POST['nim']) . "</p>";
            echo "<p>Email: " . ($_POST['email']) . "</p>";
            
        }
        
    } else {
      
        include 'form.inc';
    }
    ?>
</body>
</html>