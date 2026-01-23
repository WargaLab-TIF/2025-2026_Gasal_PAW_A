<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Master Supplier</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    table {
      border-collapse: collapse;
      width: 80%;
      background-color: white;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #cce5ff;
    }

    a.tambah {
      background-color: #4CAF50;
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 5px;
      margin-bottom: 10px;
      display: inline-block;
    }

    .btn {
      padding: 6px 10px;
      border: none;
      border-radius: 5px;
      color: white;
      text-decoration: none;
    }

    .edit {
      background-color: #ff9800;
    }

    .hapus {
      background-color: #f44336;
    }

    .btn:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <h2>Data Master Supplier</h2>
  <a href="tambah.php" class="tambah">Tambah Data</a><br><br>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Supplier</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th>Tindakan</th>
    </tr>

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM supplier");
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>
                <td>".$data['id']."</td>
                <td>".$data['nama']."</td>
                <td>".$data['telp']."</td>
                <td>".$data['alamat']."</td>
                <td>
                  <a href='edit.php?id=".$data['id']."' class='btn edit'>Edit</a>
                  <a href='hapus.php?id=".$data['id']."' class='btn hapus' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
  </table>
</body>
</html>
