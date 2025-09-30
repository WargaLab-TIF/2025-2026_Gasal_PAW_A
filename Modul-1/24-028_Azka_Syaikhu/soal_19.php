<?php
    $nama     = ($_GET['nama'] ?? '');
    $nim      = ($_GET['nim'] ?? '');
    $jurusan    = ($_GET['jurusan'] ?? '');
    $gender    = ($_GET['gender'] ?? '');
    $angkatan = ($_GET['angkatan'] ?? '');
    $alamat   = ($_GET['alamat'] ?? '');
    $email    = ($_GET['email'] ?? '');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 19 - Biodata Mahasiswa</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .main-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 40px;
        }

        .form-section {
            flex: 1; 
        }
        
        .display-section {
            flex: 1; 
        }

        
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #218838;
        }

        
        .display-section h2 {
            color: #007bff;
            margin-top: 0;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            width: 30%; 
        }

        
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                gap: 20px;
            }
            h1 {
                font-size: 24px;
            }
            .display-section h2 {
                margin-top: 20px;
            }
            th, td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
            th {
                background-color: #e9e9e9;
                font-size: 1.1em;
            }
            td {
                margin-bottom: 15px;
            }
            
            tr {
                border: 1px solid #ccc;
                display: block;
                margin-bottom: 20px;
                border-radius: 5px;
            }
            .form-group input {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Biodata Mahasiswa</h1>

    <div class="main-container">
        <div class="form-section">
            <h3>Input Data:</h3>
            <form action="" method="GET"> 
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $nama ?>">
                </div>
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="number" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $nim ?>">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" value="<?= $jurusan ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" placeholder="Masukkan gender" value="<?= $gender ?>">
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan:</label>
                    <input type="number" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" value="<?= $angkatan ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $alamat ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" value="<?= $email ?>">
                </div>
                <button type="submit" class="submit-button">Kirim Data</button>
            </form>
        </div>

        <div class="display-section">
            <h2>Data yang Dimasukkan:</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>Nama</th>
                    <td><?= $nama ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <td><?= $nim ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><?= $jurusan ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= $gender ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>Angkatan</th>
                    <td><?= $angkatan ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $alamat ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $email ?: 'Belum ada data yang dimasukkan' ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>