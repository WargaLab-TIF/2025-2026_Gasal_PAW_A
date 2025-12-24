<?php
require 'config.php';
if (!isset($_SESSION['username'])) header("Location: login.php");
if ($_SESSION['level'] != 1) die("Anda tidak memiliki akses!");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Halaman Data Master</h2>
</div>

</body>
</html>
