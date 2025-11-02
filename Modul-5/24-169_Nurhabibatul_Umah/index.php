<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Data Supplier</title>
</head>
<body class="bg-light">
    <div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3 class="mb-0" style='color: #67b1e5ff;'>Data Master Supplier</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="tambah.php" class="btn btn-success mb-3">Tambah Data</a>
        </div>
    </div>
        <?php if (isset($_GET['status'])): ?>
            <p>
                <?php
                    if ($_GET['status'] == 'sukses'){
                        echo "Supplier Baru Berhasil Ditambahkan";
                    }else{
                        echo "Penambahan Supplier Baru Gagal!";
                    }
                ?>
            </p>
        <?php endif; ?>
  
    <div class="card">
    <div class="card-body">

    <table class="table table-bordered">
        <thead class='table-primary'>
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
                $query = "SELECT * FROM supplier";
                $result = mysqli_query($conn, $query);
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nama']. "</td>";
                    echo "<td>" . $row['telp']. "</td>";
                    echo "<td>" . $row['alamat']. "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=".$row['id']."' class='btn btn-danger btn-sm me-2'>Edit</a>";
                    echo "<a href='hapus.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus </a>";
                    echo "</td>";
                    echo "</tr>";

                    }
                ?>
        </tbody>
    </table>
    </div>
</div>
</div>
</body>
</html>