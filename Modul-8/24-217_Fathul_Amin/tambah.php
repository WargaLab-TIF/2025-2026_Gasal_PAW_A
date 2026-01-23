<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Master Supplier Baru</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Tambah Data Master Supplier Baru</h2>
  <form action="proses_tambah.php" method="post">
    <label>Nama</label>
    <input type="text" name="nama" required><br>

    <label>Telp</label>
    <input type="text" name="telp" required><br>

    <label>Alamat</label>
    <input type="text" name="alamat" required><br>

    <button type="submit" class="btn btn-simpan">Simpan</button>
    <a href="data_master.php" class="btn btn-batal">Batal</a>
  </form>
</body>
</html>