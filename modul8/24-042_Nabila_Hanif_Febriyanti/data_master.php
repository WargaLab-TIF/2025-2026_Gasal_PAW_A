<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$user  = $_SESSION['username'];
$level = $_SESSION['level'];

$result = mysqli_query($conn, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Data Master Supplier</title>
    
<style>
    .navbar { 
        background: #d63990ff; 
        color:white; 
        padding:14px 25px; 
        display:flex; 
        justify-content:space-between; 
        align-items:center; 
    }
    .menu a { 
        color:white; 
        text-decoration:none; 
        margin-right:25px; 
        font-weight:bold; 
    }
    .menu a:hover { 
        text-decoration:underline; 
    }
    .right { 
        font-weight:bold; 
    }
    body { 
        font-family: garamond; 
        margin: 40px; 
    }
    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 10px; 
    }
    th, td { 
        border: 1px solid #ddd; 
        padding: 8px; 
        text-align: left; 
    }
    th { 
        background: #d6edf9; 
    }
    tr { 
        background: #f9f9f9; 
    }
    .btn { 
        border: none; 
        padding: 6px 12px; 
        border-radius: 4px; 
        color: white; 
        cursor: pointer; 
        text-decoration: none; 
        display: inline-block; 
    }
    .btn-edit { 
        background: #f39c12; 
    }
    .btn-hapus { 
        background: #c12a19ff; 
    }

</style>

</head>
<body>

<div class="navbar">
    <div class="menu">
        <a href="index.php">Home</a>

        <?php if ($level == 1): ?>
            <a href="data_master.php">Data Master</a>
        <?php endif; ?>

        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="right">
        <?= $user ?> | 
        <a href="logout.php" style="color:blue;">Logout</a>
    </div>
</div>

<h2 style= "text-align: center" > DATA MASTER SUPPLIER</h2>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Telp</th>
    <th>Alamat</th>
    <th>Tindakan</th>
  </tr>

    <?php
        if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $rows['id'] . '</td>';
            echo '<td>' . $rows['nama'] . '</td>';
            echo '<td>' . $rows['telp'] . '</td>';
            echo '<td>' . $rows['alamat'] . '</td>';
            echo '<td>';
            echo '<a href="editdata.php?id=' . $rows['id'] . '" class="btn btn-edit">Edit</a> ';
            echo '<a href="datahapus.php?id=' . $rows['id'] . '" class="btn btn-hapus" onclick="return confirm(\'Anda yakin akan menghapus supplier ini?\')">Hapus</a>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='5' style='text-align:center;'>Data belum ada</td></tr>";
    }
    ?>

</table>

</body>
</html>