<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 9</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50px;
            margin: 0;
        }
        .container{
            background-color: #ffffffff;
            padding: 20px 55px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            width: 300px;
            margin-top: 20px;
        }
        h3{
            text-align: center;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button{
            width: 100%;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Nilai & Grade Mahasiswa</h3>
    <form action="" method="post">
        <label for="nama">Masukkan Nama Mahasiswa</label><br>
        <input type="text" name="nama" id="nama" required><br>

        <label for="nim">Masukkan NIM</label><br>
        <input type="number" name="nim" id="nim" required><br>

        <label for="matkul">Mata Kuliah</label><br>
        <input type="text" name="matkul" id="matkul" required><br>

        <label for="nilai">Masukkan Nilai</label><br>
        <input type="number" name="nilai" id="nilai" min="0" max="100" required><br>

        <button type="submit">Kirim</button><br>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $matkul = $_POST['matkul'];
            $nilai = $_POST['nilai'];
            $grade = '';
                if ($nilai >= 85){
                    $grade = "A";
                }elseif ($nilai >= 75){
                    $grade = "B";
                }elseif ($nilai >= 60){
                    $grade = "C";
                }elseif ($nilai >= 40){
                    $grade = "D";
                }else{
                    $grade = "E";
                }
                echo "<strong>Nama: </strong>$nama<br>";
                echo "<strong>NIM: </strong>$nim<br>";
                echo "<strong>Matakuliah: </strong>$matkul<br>";
                echo "<strong>Nilai: </strong>$nilai<br>";
                echo "<strong>Grade: </strong>$grade<br>";
        }
    ?>
    </div>
</body>
</html>