<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <style>
        body {
            font-family: verdana, sans-serif;
            background: #597db4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box {
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(164, 22, 107, 0.1);
            width: 300px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 15px;
            margin-top: 10px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #d63990ff;
            border: none;
            color: white;
            font-size: 16px;
            margin-top: 15px;
            border-radius: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #d63990ff;
        }
    </style>

</head>
<body>
    <div class="login-box">
        <h3>LOGIN ADMIN</h3>
        <form action="proses_login.php" method="post">
            <input type="text" name="username" placeholder="username"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>