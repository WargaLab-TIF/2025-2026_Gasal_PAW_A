<?php
session_start();

// Proteksi halaman
if(!isset($_SESSION['login'])){
    header("location:index.php");
}

// Logout
if(isset($_GET['logout'])){
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background:#f2f2f2;
        }

        /* NAVBAR */
        .navbar{
            background: linear-gradient(#0d60a6, #0b4f8a);
            height:50px;
            color:white;
            display:flex;
            align-items:center;
            padding:0 20px;
        }

        .nav-left{
            width:25%;
            font-weight:bold;
        }

        .nav-center{
            width:50%;
            text-align:center;
        }

        .nav-center a{
            color:white;
            text-decoration:none;
            margin:0 15px;
            font-size:14px;
        }

        .nav-center a:hover{
            text-decoration:underline;
        }

        .nav-right{
            width:25%;
            text-align:right;
            font-size:14px;
        }

        /* CONTENT */
        .container{
            padding:40px 20px;
        }

        .box{
            background:white;
            padding:25px;
            max-width:800px;
            margin:auto;
            box-shadow:0 0 5px rgba(0,0,0,0.2);
        }

        h2{
            margin-top:0;
            color:#0d60a6;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <!-- KIRI -->
    <div class="nav-left">
        Sistem Penjualan
    </div>

    <!-- TENGAH -->
    <div class="nav-center">
        <a href="home.php">Home</a>

        <?php if($_SESSION['level'] == 1){ ?>
            <a href="#">Data Master</a>
        <?php } ?>

        <a href="#">Transaksi</a>
        <a href="#">Laporan</a>
    </div>

    <!-- KANAN -->
    <div class="nav-right">
        <?= $_SESSION['nama']; ?> |
        <a href="?logout=true" style="color:white; text-decoration:none;">Logout</a>
    </div>

</div>

<!-- CONTENT -->
<div class="container">
    <div class="box">
        <h2>Selamat Datang, <?= $_SESSION['nama']; ?></h2>

        <?php if($_SESSION['level'] == 1){ ?>
            <p><b>Level :</b> Admin (1)</p>
        <?php }else{ ?>
            <p><b>Level :</b> User (2)</p>
        <?php } ?>

        <p>
            Ini adalah halaman Home yang sudah menggunakan <b>Session & Security</b>.
            Jika user belum login, maka otomatis akan diarahkan kembali ke halaman login.
        </p>

        <p><b>Hak Akses:</b></p>
        <ul>
            <li>Level 1 → Home, Data Master, Transaksi, Laporan</li>
            <li>Level 2 → Home, Transaksi, Laporan</li>
        </ul>
    </div>
</div>

</body>
</html>
