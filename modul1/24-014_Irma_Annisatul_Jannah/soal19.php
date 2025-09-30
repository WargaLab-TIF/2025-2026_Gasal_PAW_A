<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Biodata Mahasiswa</title>
</head>
<body>

  <h2>Form Input Biodata</h2>
  <!-- Form kirim data lewat query string -->
  <form method="get">
    Nama: <input type="text" name="nama"><br><br>
    NIM: <input type="text" name="nim"><br><br>
    Kelas: <input type="text" name="kelas"><br><br>
    Alamat: <input type="text" name="alamat"><br><br>
    Prodi: <input type="text" name="prodi"><br><br>
    <input type="submit" value="Tampilkan Biodata">
  </form>

  <hr>

  <?php
  // Cek apakah ada data GET
  if (!empty($_GET)) {
      // Ambil data dari query string
      $nama   = isset($_GET['nama']) ? ($_GET['nama']) : '';
      $nim    = isset($_GET['nim']) ? ($_GET['nim']) : '';
      $kelas  = isset($_GET['kelas']) ? ($_GET['kelas']) : '';
      $alamat = isset($_GET['alamat']) ? ($_GET['alamat']) : '';
      $prodi  = isset($_GET['prodi']) ? ($_GET['prodi']) : '';
  ?>
      <h2>Biodata Mahasiswa</h2>
      <table border="1">
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
  <?php
  }
  ?>

</body>
</html>
