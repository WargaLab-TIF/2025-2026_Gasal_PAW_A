<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Supplier</title>
</head>
<body>
  <h2>Tambah Data Supplier</h2>
  <form method="post" action="">
    <label>Nama Supplier:</label><br>
    <input type="text" name="nama" required><br>
    <label>Telepon:</label><br>
    <input type="text" name="telp"><br>
    <label>Alamat:</label><br>
    <input type="text" name="alamat"><br><br>
    <input type="submit" name="simpan" value="Simpan">
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $simpan = mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama','$telp','$alamat')");
    if ($simpan) {
      echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
    } else {
      echo "Gagal menyimpan data";
    }
  }
  ?>
</body>
</html>
