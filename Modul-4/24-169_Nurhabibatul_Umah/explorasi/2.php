<?php
$username = trim($_POST['username']); 
$username = strtolower($username);  
if (preg_match("/^[a-z0-9]+$/", $username))
    echo "Username valid";
else
    echo "Username tidak valid";
?>