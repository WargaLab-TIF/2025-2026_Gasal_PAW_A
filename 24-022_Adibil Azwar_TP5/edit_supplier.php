<?php
require 'config.php';

$id = $_GET['id'] ?? die('ID Supplier tidak ditemukan.');

// Ambil data supplier berdasarkan ID
$sql = "SELECT nama, telp, alamat FROM supplier WHERE id = $id";
$result = mysqli_query($conn, $sql);
$supplier = mysqli_fetch_assoc($result);

if (!$supplier) {
    die('Data Supplier tidak ditemukan.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-update { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; }
        .btn-batal { background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Data Master Supplier</h2>
    
    <form method="POST" action="update_supplier.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($supplier['nama']); ?>" required>
        
        <label for="telp">Telp:</label>
        <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($supplier['telp']); ?>" required>
        
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required><?php echo htmlspecialchars($supplier['alamat']); ?></textarea>
        
        <button type="submit" class="btn-update">Update</button>
        <a href="list_supplier.php" class="btn-batal" style="display: inline-block;">Batal</a>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>