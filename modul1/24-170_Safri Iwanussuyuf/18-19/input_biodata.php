<?php

$nama=$_GET["nama"]?? "";
$nim=$_GET["nim"]?? "";
$mata_kuliah=$_GET["matkul"]?? "";
$kelas=$_GET["kelas"]?? "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Biodata</h1>
    
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nim</th>
            <th>Mata kuliah</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td><?=$nama?></td>
            <td><?=$nim?></td>
            <td><?=$mata_kuliah?></td>
            <td><?=$kelas?></td>
        </tr>
    </table>
    <form action="input_biodata.php" method="get">
        <p>Nama Lengkap:</p>
        <input type="text" name="nama" placeholder="masukkan nama anda!">
        <p>NIM:</p>
        <input type="number" name="nim" placeholder="masukkan nim anda!">
        <p>Matakuliah:</p>
        <input type="text" name="matkul" placeholder="masukkan matakuliah anda!">
        <p>kelas:</p>
        <input type="text" name="kelas" placeholder="masukkan kelas anda!">
        <input type="submit" value="kirim">
    </form>
</body>
</html>