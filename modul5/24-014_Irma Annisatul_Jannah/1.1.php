<?php
require 'soal1.php';

// ambil 10 data pertama
$sql = "SELECT * FROM supplier ORDER BY id ASC LIMIT 10";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>data supplier</title>
<style>
/* ====== gaya mirip contoh modul ====== */
body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
.container {
    width: 80%;
    max-width: 800px;
    margin: 50px auto;
    background: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
h2 {
    font-size: 24px;
    margin: 0;
    text-transform: capitalize;
}
a.add {
    background-color: #007bff;
    color: white;
    padding: 8px 14px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
}
a.add:hover {
    background-color: #0056b3;
}
table {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
th, td {
    border: 1px solid #ccc;
    padding: 8px;
}
th {
    background-color: #f7f7f7;
}
tr:nth-child(even) {
    background-color: #fafafa;
}
.actions a {
    color: #007bff;
    text-decoration: none;
    margin: 0 5px;
}
.actions a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>data supplier</h2>
        <a class="add" href="soal2.php">+ tambah data</a>
    </div>

    <table>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>telepon</th>
            <th>alamat</th>
            <th>aksi</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = htmlspecialchars($row['id']);
                $nama = htmlspecialchars($row['nama']);
                $telp = htmlspecialchars($row['telp']);
                $alamat = htmlspecialchars($row['alamat']);
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$nama}</td>";
                echo "<td>{$telp}</td>";
                echo "<td>{$alamat}</td>";
                echo "<td class='actions'>
                        <a href='soal3.php?id={$id}'>edit</a> |
                        <a href='soal4.php?id={$id}' onclick=\"return confirm('hapus data ini?')\">hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>tidak ada data</td></tr>";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
    </table>
</div>

</body>
</html>
