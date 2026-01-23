<?php 
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
    echo "<script>alert('Silakan login dulu!'); window.location='login.php';</script>";
    exit;
}

$nama_user = $_SESSION['nama'];
$level_user = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div class="left">
      <p class="brand">Sistem Penjualan</p>
      <p>Home</p>
      <?php if($level_user == '1') { ?>
      <p>Data Master</p>
      <?php } ?>
      <p>Transaksi</p>
      <p>Laporan</p>
    </div>

    <div class="right">
      <p><?= $nama_user; ?> ▾</p>
    </div>
  </header>

  <div style="padding: 20px; text-align: center;">
    <h1>Selamat Datang, <?= $nama_user; ?></h1>
    <br>
    <a href="logout.php" class="logout-btn"
      style="text-decoration:none; padding:10px 20px; background:red; color:white; border-radius:5px;">Logout</a>
  </div>
</body>

</html>