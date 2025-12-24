<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","modul8");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi,
        "SELECT * FROM user WHERE username='$username' AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);

        $_SESSION['login'] = true;
        $_SESSION['nama']  = $data['nama'];
        $_SESSION['level'] = $data['level'];

        header("location:home.php");
    } else {
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body{
            background:#efefef;
            font-family: Arial, sans-serif;
        }

        .box{
            width:320px;
            margin:120px auto;
            text-align:center;
        }

        .box h2{
            color:#6BAFD9;
            font-weight:normal;
            margin-bottom:15px;
        }

        .box input{
            width:100%;
            padding:10px;
            border:1px solid #dcdcdc;
            margin-bottom:8px;
            border-radius:3px;
            color:#555;
        }

        .box button{
            width:100%;
            padding:12px;
            background:#3DA6E4;
            border:none;
            color:white;
            border-radius:4px;
            cursor:pointer;
        }

        .box button:hover{
            opacity:0.9;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Login Admin</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
