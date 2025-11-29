<?php
require 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>

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
            <?php
            $sql = "SELECT * FROM supplier ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $no = 1; 
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["telp"]; ?></td>
                    <td><?php echo $row["alamat"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-edit">Edit</a>
                        
                        <a href="hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-hapus" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            mysqli_close($conn); 
            ?>
        </tbody>
    </table>

</body>
</html>