<?php
session_start();
require '../config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){
    $data = mysqli_fetch_assoc($result);
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];


    header("Location: ../index.php");
    exit;
}else{
    echo "<script>alert('Username atau Password Salah');window.location='login.php';</script>";
}
?>