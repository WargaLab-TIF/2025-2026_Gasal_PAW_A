<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai Mata Kuliah</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5; 
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            margin-bottom: 30px;
        }

        h2 {
            text-align: center;
            color: #1d2129;
            margin-bottom: 25px;
        }

        form table {
            width: 100%;
            border-collapse: collapse;
        }

        form td {
            padding: 8px 4px;
        }

        label {
            font-weight: 600;
            color: #4b4f56;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccd0d5;
            border-radius: 6px;
            box-sizing: border-box; 
            font-size: 16px;
        }
        
        input:focus {
            outline: none;
            border-color: #1877f2; 
            box-shadow: 0 0 0 2px #e7f3ff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2af218ff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
            transition: background-color 0.2s;
        }
        
        .result-table {
            width: 100%;
            max-width: 500px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden; 
        }

        .result-table caption {
            font-size: 1.6em;
            font-weight: bold;
            padding: 15px;
            color: #1d2129;
            background-color: #f7f7f7;
        }
        
        .result-table td {
            padding: 15px;
            border-bottom: 1px solid #e9ebee;
        }

        .result-table tr:last-child td {
            border-bottom: none;
        }

        .result-table td:nth-child(2) {
            font-weight: bold;
            color: #333;
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h2>Input Nilai Mahasiswa</h2>
        <form action="" method="GET">
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" id="nama" name="nama" required placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td><label for="kelas">Kelas</label></td>
                    <td>:</td>
                    <td><input type="text" id="kelas" name="kelas" required placeholder="Masukkan Kelas"></td>
                </tr>
                <tr>
                    <td><label for="matkul">Mata Kuliah</label></td>
                    <td>:</td>
                    <td><input type="text" id="matkul" name="matkul" required placeholder="Masukkan Mata Kuliah"></td>
                </tr>
                <tr>
                    <td><label for="nilai">Nilai</label></td>
                    <td>:</td>
                    <td><input type="number" id="nilai" name="nilai" min="0" max="100" required placeholder="0-100"></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit">Kirim</button></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if (isset($_GET['nama']) && isset($_GET['nilai'])) {

        $nama = trim($_GET['nama']);
            $kelas = trim($_GET['kelas']);
        $matkul = trim($_GET['matkul']);
        $nilai = (int)$_GET['nilai'];
        $grade = ""; 

        if ($nilai >= 90) {
            $grade = "A";
        } elseif ($nilai >= 85) {
            $grade = "B";
        } elseif ($nilai >= 79) {
            $grade = "C";
        } else {
            $grade = "D"; 
        }
    ?>

    <table class="result-table">
        <caption>
            <b>Hasil Nilai Mahasiswa</b>
        </caption>
        <tr>
            <td>1.</td>
            <td>Nama</td>
            <td><?php echo($nama); ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Kelas</td>
            <td><?php echo($kelas); ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Mata Kuliah</td>
            <td><?php echo($matkul); ?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Nilai</td>
            <td><?php echo($nilai); ?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Grade</td>
            <td><?php echo($grade); ?></td>
        </tr>
    </table>

    <?php
    } 
    ?>
</body>
</html>