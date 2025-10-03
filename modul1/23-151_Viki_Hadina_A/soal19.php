<!DOCTYPE html>
<html>
<body>
<?php
$nama = $_GET["nama"] ?? "Anonim";
$nim = $_GET["nim"] ?? "Tidak ada";
$jurusan = $_GET["jurusan"] ?? "Tidak ada";
echo "<h2>Biodata Mahasiswa</h2>";
echo "<table border=1>";
echo "<tr><th>Nama</th><th>NIM</th><th>Jurusan</th></tr>";
echo "<tr><td>$nama</td><td>$nim</td><td>$jurusan</td></tr>";
echo "</table>";
?>
</body>
</html>