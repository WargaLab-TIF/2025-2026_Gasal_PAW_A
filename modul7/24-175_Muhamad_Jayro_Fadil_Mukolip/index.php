<?php
require "conn.php"; // Pastikan koneksi ini sudah benar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <style>
        /* Gaya dasar untuk halaman */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        /* Kontainer utama untuk membungkus konten */
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px 40px;
            border-radius: 8px;
            /* box-shadow: 0 2px 8px rgba(0,0,0,0.05); */
        }

        /* Bagian header yang berisi judul dan tombol 'Tambah' */
        .header {
            display: flex;
            justify-content: space-between; /* Mendorong judul dan tombol terpisah */
            align-items: center;
            margin-bottom: 25px;
        }

        /* Judul Halaman (Biru) */
        .header h2 {
            color: #337ab7; /* Warna biru seperti di gambar */
            margin: 0;
        }

        /* Gaya umum untuk semua tombol */
        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none; /* Menghilangkan garis bawah dari link */
            display: inline-block;
            margin: 0 2px;
        }

        /* Tombol Tambah Data (Hijau) */
        .btn-tambah {
            background-color: #5cb85c;
        }
        .btn-tambah:hover {
            background-color: #4cae4c;
        }

        /* Tombol Edit (Oranye) */
        .btn-edit {
            background-color: #f0ad4e;
        }
        .btn-edit:hover {
            background-color: #ec971f;
        }

        /* Tombol Hapus (Merah) */
        .btn-hapus {
            background-color: #d9534f;
        }
        .btn-hapus:hover {
            background-color: #c9302c;
        }

        /* Gaya untuk Tabel */
        .supplier-table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan celah antar border */
            font-size: 14px;
        }

        /* Header Tabel (TH) */
        .supplier-table th {
            background-color: #f0f3f5; /* Latar belakang header tabel */
            color: #555;
            padding: 12px 15px;
            text-align: left;
            /* Border bawah tebal untuk header */
            border-bottom: 2px solid #ddd; 
        }

        /* Sel Data Tabel (TD) */
        .supplier-table td {
            padding: 12px 15px;
            color: #333;
            /* Border bawah tipis untuk setiap baris data */
            border-bottom: 1px solid #ddd;
        }

        /* Menghilangkan border di baris terakhir */
        .supplier-table tr:last-child td {
            border-bottom: none;
        }

        /* Gaya untuk sel "Tindakan" */
        .supplier-table td:last-child {
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Data Master Supplier</h2>
            <div>
                <a href="./tindakan/tambah.php" class="btn btn-tambah">Tambah Data</a>
                <a href="./barang/barang.php" class="btn btn-tambah">Lihat Barang</a>
                <a href="./cetak/penjualan.php" class="btn btn-tambah">Penjualan</a>
            </div>
        </div>

        <table class="supplier-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th> <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM supplier";
                $result = mysqli_query($conn, $sql);
                $num = 1;

                if (mysqli_num_rows($result) > 0) {
                    // Loop untuk menampilkan data
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $num ?></td>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["telp"] ?></td>
                            <td><?= $row["alamat"] ?></td>
                            <td>
                                <a href="./tindakan/edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                                <a href="./tindakan/hapus.php?id=<?= $row['id'] ?>" class="btn btn-hapus">Hapus</a>
                            </td>
                        </tr>
                <?php
                        $num++;
                    } // Akhir dari while loop
                } else {
                    // Tampilkan pesan jika tidak ada data
                    echo "<tr><td colspan='5' style='text-align:center; color: #777;'>0 results</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div> 
</body>
</html>