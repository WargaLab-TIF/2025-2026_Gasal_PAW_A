<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Tabel</title>
</head>
<body>

<?php
$nama   = "Firda";
$nim    = "240411100191";
$fakultas  = "Teknik";
$jurusan = "Teknik Informatika";
$alamat = "Jl. Malang, Kota Surabaya";

echo "<h2>Biodata Mahasiswa</h2>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";

echo "<tr>
<td>Nama</td>
<td>$nama</td>
</tr>";

echo "<tr>
<td>NIM</td>
<td>$nim</td>
</tr>";

echo "<tr>
<td>Fakultas</td>
<td>$fakultas</td>
</tr>";

echo "<tr>
<td>Jurusan</td>
<td>$jurusan</td>
</tr>";

echo "<tr>
<td>Alamat</td>
<td>$alamat</td>
</tr>";

echo "</table>";
?>

</body>
</html>