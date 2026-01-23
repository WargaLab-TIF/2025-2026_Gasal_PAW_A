<?php 
session_start();
require 'conn.php';

if(isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($password == $row['password']){

            // Set session
            $_SESSION['username'] = $row['username'];
            $_SESSION['login']    = true;
            $_SESSION['level']    = $row['level'];
            $_SESSION['id_user']  = $row['id_user'];

            // Redirect pakai JavaScript (aman walau ada output)
            echo "<script>
                    alert('Login berhasil, selamat datang ". $row['nama'] ."');
                    window.location.href='index.php';
                  </script>";

        } else {
            echo "<script>
                    alert('Password salah!');
                    window.location.href='login.php';
                  </script>";
        }

    } else {
        echo "<script>
                alert('Username tidak ditemukan!');
                window.location.href='login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <h3>Login</h3>

    <form action="" method="post">
        <input 
            type="text" 
            name="username" 
            placeholder="uername" 
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="password" 
            required
        >

        <input 
            type="submit" 
            name="submit" 
            value="Login"
        >
    </form>

</body>
</html>