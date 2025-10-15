<?php
$nama   = $_GET['nama'] ?? "Belum diisi";
$nim    = $_GET['nim'] ?? "Belum diisi";
$kelas  = $_GET['kelas'] ?? "Belum diisi";
$alamat = $_GET['alamat'] ?? "Belum diisi";
?>

<!DOCTYPE html>
<html>
<body>
<h2>Biodata (Input via Query String)</h2>
<table border="1" cellpadding="8">
  <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
  <tr><td>NIM</td><td><?php echo $nim; ?></td></tr>
  <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
  <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
</table>
</body>
</html>
