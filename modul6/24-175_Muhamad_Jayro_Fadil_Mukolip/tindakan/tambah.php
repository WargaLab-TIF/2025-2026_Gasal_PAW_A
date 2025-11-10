<?php
session_start();
// Ambil data lama jika ada (setelah validasi gagal)
$data_lama = $_SESSION['data_lama'] ?? [];
$nama = $data_lama['Nama'] ?? '';
$telpon = $data_lama['telpon'] ?? '';
$alamat = $data_lama['alamat'] ?? '';

// Hapus data lama dari session agar tidak muncul lagi
unset($_SESSION['data_lama']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Supplier</title>
    <style>
        /* Menggunakan font sans-serif yang bersih */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        /* Container untuk membungkus form */
        .container {
            background-color: #fff;
            padding: 25px 40px;
            border-radius: 8px;
            width: 450px;
        }

        /* Judul form (biru) */
        h3 {
            font-size: 24px;
            color: #337ab7;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        /* Style untuk kotak error */
        .error-box {
            background-color: #f2dede; /* Latar belakang merah muda */
            border: 1px solid #d9534f;  /* Border merah */
            color: #a94442;           /* Teks merah tua */
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .error-box b {
            display: block;
            margin-bottom: 5px;
        }

        /* Menggunakan CSS Grid untuk layout form */
        .edit-form {
            display: grid;
            grid-template-columns: 80px 1fr;
            row-gap: 15px;
            column-gap: 15px;
            align-items: center;
        }

        .edit-form label {
            font-weight: 600;
            color: #333;
        }

        /* Styling untuk semua input dan textarea */
        .edit-form input[type="text"],
        .edit-form input[type="number"],
        .edit-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
            font-size: 14px;
        }
        
        .edit-form textarea {
            height: 80px; 
            resize: vertical; 
        }

        /* Grup untuk tombol */
        .button-group {
            /* Pindahkan grup tombol ke kolom kedua */
            grid-column: 2;
            margin-top: 10px;
        }

        /* Styling umum untuk tombol */
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 8px;
        }

        /* Tombol "Tambah" (Hijau) 
           Kita gunakan .btn-update dari CSS sebelumnya untuk warna hijau
        */
        .btn-update {
            background-color: #5cb85c;
        }
        .btn-update:hover {
            background-color: #4cae4c;
        }

        /* Tombol Batal (Merah) */
        .btn-cancel {
            background-color: #d9534f;
        }
        .btn-cancel:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Tambah Data Master Supplier</h3>

        <?php 
        // Menampilkan pesan error validasi jika ada
        if (!empty($_SESSION['errors'])){
            // Menggunakan class CSS .error-box
            echo '<div class="error-box">';
            echo '<b>Invalid, correct the following errors:</b><br>';
            foreach ($_SESSION['errors'] as $field => $error)
                // Pastikan untuk meng-escape output
                echo $field . ': ' . $error . '<br>';
            echo '</div>';
            // Hapus error dari session setelah ditampilkan
            unset($_SESSION['errors']);
        }
        ?>

        <form action="../operasi/val_tambah.php" method="post" class="edit-form">
            
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama" value="<?= $nama ?>">

            <label for="telpon">Telp</label>
            <input type="number" name="telpon" id="telpon" value="<?= $telpon ?>">

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"><?= $alamat ?></textarea>
            
            <div class="button-group">
                <button type="submit" class="btn btn-update">Tambah</button>
                
                <a href="../index.php" class="btn btn-cancel">Batal</a>
            </div>

        </form>
        
        </div>

</body>
</html>