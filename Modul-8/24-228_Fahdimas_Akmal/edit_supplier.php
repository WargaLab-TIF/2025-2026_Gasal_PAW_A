<?php
include 'koneksi.php'; 
$id = $_GET['id'];


$id_safe = mysqli_real_escape_string($conn, $id);


$sql = "SELECT * FROM supplier WHERE id = $id_safe";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Master Supplier</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h2>Edit Data Master Supplier</h2>

    <form action="proses_edit_supplier.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div>
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" value="<?php echo $row['telp']; ?>" required>
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
        </div>
        <div>
            <label></label> <button type="submit" name="update" class="btn btn-update">Update</button>
            <a href="supplier.php" class="btn btn-batal">Batal</a>
        </div>
    </form>

</body>
</html>