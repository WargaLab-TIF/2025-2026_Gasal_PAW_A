<?php
require 'config.php';
if (!isset($_SESSION['username'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Halaman Laporan</h2>
</div>

</body>
</html>
