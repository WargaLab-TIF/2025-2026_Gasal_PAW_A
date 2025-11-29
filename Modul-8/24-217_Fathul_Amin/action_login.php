<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($conn,
    "SELECT * FROM user 
     WHERE username='$username' 
     AND password='$password'"
);

$data = mysqli_fetch_assoc($q);

if ($data) {
    $_SESSION['login'] = $data['id'];

    header("Location: home.php");
    exit();
} else {
    $error_msg = urlencode("Username atau password salah!");
    header("Location: login.php?error=$error_msg");
    exit();
}
?>
