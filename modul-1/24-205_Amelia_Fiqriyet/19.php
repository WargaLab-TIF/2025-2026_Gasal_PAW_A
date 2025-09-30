<?php
$nama   = "Malik";
$nim    = "2400173";
$jurusan = "Informatika";
$alamat = "Telang";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
</head>
<body>
  <h2>Biodata Mahasiswa</h2>
  <table border="1" cellpadding="5">
    <tr><th>Nama</th><td><?php echo $nama; ?></td></tr>
    <tr><th>NIM</th><td><?php echo $nim; ?></td></tr>
    <tr><th>Jurusan</th><td><?php echo $jurusan; ?></td></tr>
    <tr><th>Alamat</th><td><?php echo $alamat; ?></td></tr>
  </table>
</body>
</html>
