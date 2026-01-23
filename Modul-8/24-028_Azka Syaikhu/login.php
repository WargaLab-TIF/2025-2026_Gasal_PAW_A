<?php
require 'config.php';

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>LOGIN</h2>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label>Username</label><br>
        <input type="text" name="username" required><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br>

        <button type="submit" name="login">Masuk</button>
    </form>
</div>

</body>
</html>
