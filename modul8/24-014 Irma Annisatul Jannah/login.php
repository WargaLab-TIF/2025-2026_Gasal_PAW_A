<?php 
session_start();
require 'conn.php';

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($password == $row['password']){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['nama'] = $row['nama'];

            echo "<script>
            alert('Login berhasil, selamat datang {$row['nama']}');
            window.location='home.php';
            </script>";
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body { font-family: Arial; background:#e7eef7; text-align:center; }
.box { width:300px; margin:auto; margin-top:100px; padding:20px; background:white; border-radius:8px; }
input { width:90%; padding:10px; margin:5px 0; }
button { padding:10px 20px; }
</style>
</head>
<body>
<div class="box">
    <h3>Form Login</h3>

    <?php if(!empty($error)) echo "<p style='color:red'>$error</p>"; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button name="submit">Login</button>
    </form>

    <br>

</div>
</body>
</html>
