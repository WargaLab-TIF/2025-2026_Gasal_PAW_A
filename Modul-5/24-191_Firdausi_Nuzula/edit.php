<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='penjualan';
$conn = mysqli_connect($hostname, $username, $password, $dbname);

$id = $_GET['id'];
$query = "SELECT * FROM supplier WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
    if (mysqli_query($conn, $update)) {
        header("Location: config.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Master Supplier</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Telp</label>
        <input type="text" name="telp" value="<?= $data['telp'] ?>" required>

        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required>

        <div class="btn-group">
            <button class="btn btn-green" type="submit" name="update">Update</button>
            <a href="config.php" class="btn btn-red">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
