<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);


$data = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data);
    
    if($password == $row['password'] || md5($password) == $row['password']) {
        
      
        $_SESSION['username'] = $username;
        $_SESSION['nama']     = $row['nama']; // Menyimpan nama user [cite: 10, 16]
        $_SESSION['level']    = $row['level'];
        $_SESSION['status']   = "login";

        header("location:index.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}
?>