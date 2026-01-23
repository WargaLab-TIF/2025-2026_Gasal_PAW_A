<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
$nama = isset($_POST['nama_lengkap']) ? ($_POST['nama_lengkap']) : 'kosong';
$nim = isset($_POST['nim']) ? ($_POST['nim']) : 'kosong';
$email = isset($_POST['email']) ? ($_POST['email']) : 'kosong';


echo "<p><strong>Nama Lengkap:</strong> " . $nama . "</p>";
echo "<p><strong>NIM:</strong> " . $nim . "</p>";
echo "<p><strong>Email:</strong> " . $email . "</p>";
}
require 'validate.inc'; 

    if (validateName($_POST, 'nama_lengkap')){
        echo 'Data OK!'; 
    }else 
        echo 'Data invalid!';
        
?>
