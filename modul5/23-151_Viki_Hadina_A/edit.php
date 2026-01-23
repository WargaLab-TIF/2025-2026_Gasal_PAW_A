<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Data Supplier</title>
</head>
<body>
  <h2>Edit Data Supplier</h2>

  <?php
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
  $data = mysqli_fetch_array($query);
  ?>

  <form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <label>Nama Supplier:</label><br>
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
    <label>Telepon:</label><br>
    <input type="text" name="telp" value="<?php echo $data['telp']; ?>"><br>
    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"><br><br>
    <input type="submit" name="update" value="Update">
  </form>

  <?php
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
    if ($update) {
      echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
    } else {
      echo "Gagal mengupdate data";
    }
  }
  ?>
</body>
</html>
