<?php
$nama = "Nurhabibatul Umah";
$nim = "240411100169";
$prodi = "Teknik Informatika";
$angkatan = "2024";
$alamat = "Telang Indah Blok C";
$email = "nurhabibatulumah@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 18</title>
    <style>
        h1{
            text-align: center;
        }
        body{
            margin:20px;
        }
        table{
            width: 50%;
            margin-top: 20px;
            margin: auto;
            border-collapse: collapse;
        }
        th, td{
            text-align: left;
            padding: 5px;
        }
        th{
            background: #ccd1e0ff;
        }
    </style>
</head>
<body>
    <h1>Biodata Mahasiswa</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <td><?= $nama; ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= $nim; ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?= $prodi; ?></td>
        </tr>
        <tr>
            <th>Angkatan</th>
            <td><?= $angkatan; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $alamat; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $email; ?></td>
        </tr>
    </table>
</body>
</html>