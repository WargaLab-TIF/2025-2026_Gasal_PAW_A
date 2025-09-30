<?php
session_start();

if (!isset($_SESSION['biodata'])) {
    $_SESSION['biodata'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    $_SESSION['biodata'][] = [
        "nama" => $nama,
        "nim" => $nim,
        "kelas" => $kelas,
        "jurusan" => $jurusan
    ];
}

if (isset($_GET['hapus_semua'])) {
    $_SESSION['biodata'] = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 15px;
        }
        input[type="text"], input[type="submit"], a {
            padding: 5px 10px;
            margin: 3px 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
        }
        th {
            background: #eee;
        }
        a {
            text-decoration: none;
            color: white;
            background: red;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<h2>Input Biodata</h2>
<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" required><br>

    <label>Kelas:</label><br>
    <input type="text" name="kelas" required><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" required><br>

    <input type="submit" value="Tambah Data">
</form>

<h2>Daftar Biodata Mahasiswa</h2>
<?php if (!empty($_SESSION['biodata'])): ?>
    <a href="?hapus_semua=1" onclick="return confirm('Yakin ingin hapus semua data?');">Hapus Semua</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        <?php
        $no = 1;
        foreach ($_SESSION['biodata'] as $row) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['kelas']}</td>
                    <td>{$row['jurusan']}</td>
                 </tr>";
            $no++;
        }
        ?>
    </table>
<?php else: ?>
    <p>Belum ada data yang tersimpan.</p>
<?php endif; ?>

</body>
</html>