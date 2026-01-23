<?php
require 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Selamat datang, <?= $_SESSION['username']; ?></h2>
    <p>Ini adalah halaman Home.</p>
</div>

</body>
</html>
