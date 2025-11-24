<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include "navbar.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f2f2f2;
        }

        .container {
            padding: 20px;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ini adalah halaman dashboard utama.</p>
    </div>

</div>

</body>
</html>
