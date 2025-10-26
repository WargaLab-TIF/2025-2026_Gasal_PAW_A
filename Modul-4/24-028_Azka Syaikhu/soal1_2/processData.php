<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nama = isset($_POST['nama_lengkap']) ? ($_POST['nama_lengkap']) : 'kosong';
$nim = isset($_POST['nim']) ? ($_POST['nim']) : 'kosong';
$email = isset($_POST['email']) ? ($_POST['email']) : 'kosong';


echo "<p><strong>Nama Lengkap:</strong> " . $nama . "</p>";
echo "<p><strong>NIM:</strong> " . $nim . "</p>";
echo "<p><strong>Email:</strong> " . $email . "</p>";
require 'validate.inc'; 
$errors = array(); 
}

validateName($errors, $_POST, 'nama_lengkap');  
    if ($errors) { 
         echo 'Errors:<br/>'; 
        
    foreach ($errors as $field => $error)  
                echo "$field $error</br>"; 
        } else {
            echo 'Data OK!'; 
        }
?>