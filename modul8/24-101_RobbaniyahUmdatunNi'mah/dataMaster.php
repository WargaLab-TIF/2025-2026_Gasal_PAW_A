<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "penjualan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_SESSION['nama'];
$result = mysqli_query($koneksi, "SELECT * FROM supplier");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['level'] != 1) {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini!'); window.location.href='login.php';</script>";
    exit();
}
?>
<html>
<head>
    <title>Data Master</title>
    <style>body { font-family: Arial; padding: 20px; }</style>
</head>
<body>
    <style>
        h2{
            font-family: Arial;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }

        .top-bar{
            width: 95%;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 9px;
        }

        th, td{
            font-family: Arial;
            font-size: 14px;
            padding: 5px;
        }

        th{
            background-color: lightcyan;
        }

        .btn{
            color: white;
            background: linear-gradient(360deg, #0dbb5bff, #2bed38ff);
            border: none;
            padding: 7px 10px;
            border-radius: 3px;
            font-size: 10px;
            cursor: pointer;
        }

        .edt{
            color: white;
            background: linear-gradient(360deg, #dd3c0aff, #ed6137ff);
            border: none;
            padding: 7px 10px;
            border-radius: 3px;
            font-size: 10px;
            cursor: pointer;
        }

        .hps{
            color: white;
            background: linear-gradient(360deg, #9f0000ff, #e40404ff);
            border: none;
            padding: 7px 10px;
            border-radius: 3px;
            font-size: 10px;
            cursor: pointer;
        }

        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f8f9fa; }
        .navbar {
            background: #2c3e50;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
        }
        .navbar a:hover {
            background: #34495e;
        }
        .user-info {
            /* background: #e74c3c; */
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="navbar">
        <div class="menu">
            <a href="idx.php">Home</a>
            <a href="dataMaster.php">Data Master</a>
            <a href="Copy TP6/transaksi.php">Transaksi</a>
            <a href="Copy TP7/laporan.php">Laporan</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="user-info">
            Halooo, <?= $nama ?>!
        </div>
    </div>
        <h1 align="center">Data Master</h1>
    <div class="top-bar">
        <a href="Copy TP5 lagi/form.html"><button class="btn">Tambah Data</button></a>
    </div>

    <table border="1">
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td align='center'>
                        <a href='Copy TP5 lagi/formEdit.php?id=" . $row['id'] . "'>
                            <button class='edt'>Edit</button>
                        </a>
                        <a href='Copy TP5 lagi/hapusData.php?id=" . $row['id'] . "'
                            onclick=\"return confirm('Anda yakin akan menghapus supplier ini?')\">
                                <button class='hps'>Hapus</button>
                        </a>
                    </td>";
                echo "</tr>";
            }
        } else{
            echo "Gak ada datanya :(";
        }
        ?>
    </table>
</body>
</html>