<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body{background:#f2f6fb;font-family:Arial;}
        .box{width:360px;background:#fff;padding:24px;margin:70px auto;border-radius:8px;box-shadow:0 6px 20px rgba(0,0,0,0.08)}
        input{width:100%;padding:10px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
        button{width:100%;padding:10px;background:#0d6efd;color:white;border:none;border-radius:4px;cursor:pointer}
        h3{text-align:center;margin-bottom:12px}
    </style>
</head>
<body>
<div class="box">
    <h3>Login Sistem</h3>
    <form action="cek_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</div>
</body>
</html>
