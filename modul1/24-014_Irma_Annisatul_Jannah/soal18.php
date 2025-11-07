<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Biodata</title>
</head>
<body>
    <?php
$nama     = "Irma Annisatul Jannah";
$nim      = "24-014";
$kelas    = "PAW IF 3A";
$alamat   = "Nganjuk";
$prodi    = "Teknik Informatika";
?>
  <h2>Biodata Mahasiswa</h2>
  <table border="1" >
    <tr>
      <th>Nama</th>
      <td><?php echo $nama; ?></td>
    </tr>
    <tr>
      <th>NIM</th>
      <td><?php echo $nim; ?></td>
    </tr>
    <tr>
      <th>Kelas</th>
      <td><?php echo $kelas; ?></td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
      <th>Prodi</th>
      <td><?php echo $prodi; ?></td>
    </tr>
  </table>
</body>
</html>
