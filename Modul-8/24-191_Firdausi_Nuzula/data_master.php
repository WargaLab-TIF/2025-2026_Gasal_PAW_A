<?php
session_start();
include "conn.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Barang</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">   

<br>
<a href="barang_tambah.php" class="tambah-btn">+ Tambah Barang</a>

<?php
$query = "SELECT * FROM barang";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    echo '<h2>Data Master Barang</h2>';
    echo '<br>';
    echo '<table>';
    echo '<tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>ID Supplier</th>
            <th>Aksi</th>
          </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['kode_barang'].'</td>';
        echo '<td>'.$row['nama_barang'].'</td>';
        echo '<td>'.$row['harga'].'</td>';
        echo '<td>'.$row['stok'].'</td>';
        echo '<td>'.$row['supplier_id'].'</td>';
        echo '<td>
                <a href="barang_edit.php?id='.$row['id'].'" class="edit">Edit</a>
                <a href="barang_hapus.php?id='.$row['id'].'" class="hapus" onclick="return confirm(\'Hapus data?\');">Hapus</a>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "Data tidak ditemukan";
}

mysqli_close($conn);
?>

</div>   

</body>
</html>
