<?php 
session_start();

include 'conn.php';
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $row = mysqli_fetch_assoc($data);


        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['status'] = "login";


        if($row['level'] == 1){
        
            header("location:admin_index.php");
        } else if($row['level'] == 2){
        
            header("location:user_index.php");
        } else {
        
            header("location:login.php?pesan=gagal");
        }

    }else{

        header("location:login.php?pesan=gagal");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f0f0; }
        .login-box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 5px 0 15px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .alert { color: red; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 style="text-align: center;">Login Admin</h2>
        
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert'>Username atau Password salah!</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='alert'>Anda harus login dulu!</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='alert'>Anda berhasil logout.</div>";
            }
        }
        ?>

        <form action="login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" required>
            
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

</body>
</html>


