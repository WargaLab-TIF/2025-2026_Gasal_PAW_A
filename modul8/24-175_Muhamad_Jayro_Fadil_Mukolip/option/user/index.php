<?php
require 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master User</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS START --- */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #374151;
        }

        .container {
            max-width: 1152px;
            margin: 0 auto;
            background-color: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #111827;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-tambah {
            background-color: #3b82f6; /* Biru */
            color: white;
        }
        .btn-tambah:hover {
            background-color: #2563eb;
        }

        /* Action Buttons (Edit/Hapus) */
        .action-btn {
            display: inline-block;
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
            margin-bottom: 2px;
        }

        .btn-edit {
            background-color: #f59e0b; /* Kuning/Orange */
            color: white;
        }
        .btn-edit:hover {
            background-color: #d97706;
        }

        .btn-hapus {
            background-color: #ef4444; /* Merah */
            color: white;
        }
        .btn-hapus:hover {
            background-color: #dc2626;
        }

        /* Table Styling */
        .table-responsive {
            overflow-x: auto;
        }

        .supplier-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .supplier-table th, 
        .supplier-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .supplier-table th {
            background-color: #dbeafe; /* Biru Muda */
            color: #1e40af;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.05em;
        }

        .supplier-table tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .supplier-table tr:hover {
            background-color: #f3f4f6;
        }
        
        /* Kolom Tindakan agar tidak terlalu lebar */
        .col-action {
            white-space: nowrap;
            width: 1%;
        }
        /* --- CSS END --- */
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Data Master User</h2>
            <div>
                <a href="./login/form_register.html" class="btn btn-tambah">+ Tambah Data</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="supplier-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th class="col-action">Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);
                    $num = 1;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $num ?></td>
                                <td><?= $row["username"] ?></td>
                                <td><?= $row["nama"] ?></td>
                                <td><?= $row["hp"] ?></td>
                                <td><?= $row["alamat"] ?></td>
                                <td class="col-action">
                                    <!-- Saya menambahkan class CSS ke tombol ini agar terlihat bagus -->
                                    <a href="./login/edit_user.php?id=<?= $row['id_user'] ?>" class="action-btn btn-edit">Edit</a>
                                    <a href="./login/hapus_user.php?id=<?= $row['id_user'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="action-btn btn-hapus">Hapus</a>
                                </td>
                            </tr>
                            <?php
                            $num++;
                        }
                    } else {
                        // Tambahan kecil: Tampilan jika data kosong
                        echo "<tr><td colspan='6' style='text-align:center; padding: 20px;'>Tidak ada data user.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>