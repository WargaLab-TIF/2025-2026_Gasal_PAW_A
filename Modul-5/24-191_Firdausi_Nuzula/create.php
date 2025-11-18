<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='penjualan';
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $insert = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    if (mysqli_query($conn, $insert)) {
        header("Location: config.php");
        exit;
    } else {
        echo "Gagal menambah data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Data Master Supplier Baru</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama Supplier" required>

        <label>Telp</label>
        <input type="text" name="telp" placeholder="No Telepon" required>

        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Alamat" required>

        <div class="btn-group">
            <button class="btn btn-green" type="submit" name="tambah">Simpan</button>
            <a href="config.php" class="btn btn-red">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
