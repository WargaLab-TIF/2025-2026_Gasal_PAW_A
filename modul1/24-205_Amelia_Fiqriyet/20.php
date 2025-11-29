<?php
$nama = (isset($_GET['nama'])) ? $_GET['nama'] : "belum diisi";
$nim = (isset($_GET['nim'])) ? $_GET['nim'] : "belum diisi";
$jurusan =(isset($_GET['jurusan'])) ? $_GET['jurusan'] : "belum diisi";
$alamat = (isset($_GET['alamat'])) ? $_GET['alamat'] : "belum diisi";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Biodata Mahasiswa</title>
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
