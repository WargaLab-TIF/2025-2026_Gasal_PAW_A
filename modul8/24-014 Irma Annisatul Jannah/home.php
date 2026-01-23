<?php 
session_start();
require 'protect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>

<?php include 'navbar.php'; ?>

<h2>Selamat datang <?= $_SESSION['nama'] ?></h2>
<p>Anda login sebagai level <?= $_SESSION['level'] ?></p>

</body>
</html>
