<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'penjualan';

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query  = "SELECT * FROM supplier";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Data Master Supplier</h2>

    <a href="create.php" class="btn btn-green">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['telp']}</td>
                        <td>{$row['alamat']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-orange'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-red' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data supplier.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
