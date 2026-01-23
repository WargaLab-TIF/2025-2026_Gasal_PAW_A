<?php 
session_start();
require 'connect.php';

if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    header("Location: index.php");
    exit;
}

if(isset($_POST['submit'])){
    $usn = $_POST['usn'];
    $pass = $_POST['pass'];

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usn'");
    
    if(mysqli_num_rows($q) > 0){
        $data = mysqli_fetch_assoc($q);
        
        if($pass == $data['password']){
            
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = $data['level'];
            
            echo "<script>alert('Login Berhasil!'); window.location='index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Password Salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="login-wrapper">
    <div class="login-card">
      <h2>Login Admin</h2>
      <form method="post" action="">
        <div class="form-group">
          <input type="text" name="usn" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="password" name="pass" placeholder="Password" required>
        </div>
        <button type="submit" name="submit" class="btn-login">Login</button>
      </form>
    </div>
  </div>
</body>

</html>