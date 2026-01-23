<?php
require 'config.php';

// Ambil data dari tabel supplier
$sql = "SELECT id, nama, telp, alamat FROM supplier ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$suppliers = mysqli_fetch_all($result, MYSQLI_ASSOC);

$message = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 900px; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #e6f7ff; color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-edit { background-color: #ff9800; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; border: none; }
        .btn-hapus { background-color: #f44336; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; }
        .btn-tambah { background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 15px; }
        .message { padding: 10px; margin-bottom: 15px; background: #c8e6c9; color: #2e7d32; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Master Supplier</h2>
    
    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <a href="add_supplier.php" class="btn-tambah">Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($suppliers)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data supplier.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; ?>
                <?php foreach ($suppliers as $s): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($s['nama']); ?></td>
                    <td><?php echo htmlspecialchars($s['telp']); ?></td>
                    <td><?php echo htmlspecialchars($s['alamat']); ?></td>
                    <td>
                        <a href="edit_supplier.php?id=<?php echo $s['id']; ?>" class="btn-edit">Edit</a>
                        
                        <form method="POST" action="delete_supplier.php" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                            <button type="submit" class="btn-hapus" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>