<!-- Rancang halaman biodata yang fleksibel dengan input variabel (misalnya via query
string) ! -->

<?php
$nama = $_GET['nama'] ?? '';
$nim = $_GET['nim'] ?? '';
$prodi = $_GET['prodi'] ?? '';
$angkatan = $_GET['angkatan'] ?? '';
$alamat = $_GET['alamat'] ?? '';
$email = $_GET['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal no 19</title>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f5f7;
    }

    h1 {
        text-align: center;
        color: black;
        padding: 15px 0;
        margin: 0;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 50px;
        padding: 30px;
        max-width: 1000px;
        margin: 30px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    form, table {
        width: 45%;
    }

   
    form label {
        font-weight: 600;
        display: block;
        margin-top: 10px;
        margin-bottom: 5px;
    }

    form input:not([type=submit]) {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form input[type=submit] {
        margin-top: 15px;
        background-color: #44e15bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fafafa;
        border-radius: 5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    th, td {
        padding: 10px 15px;
        text-align: left;
    }

    th {
        background-color: #e1e5f2;
        width: 35%;
    }
</style>

</head>
<body>
    <h1>Biodata Mahasiswa</h1>
    <div class="container">
        <form method="get">
            Nama: <br>
            <input type="text" name="nama" placeholder="Masukkan Nama"><br>
            NIM: <br>
            <input type="number" name="nim" placeholder="Masukkan nim"><br>
            Prodi: <br>
            <input type="text" name="prodi" placeholder="Masukkan Prodi"><br>
            Angkatan: <br>
            <input type="number" name="angkatan" placeholder="Masukkan Angkatan"><br>
            Alamat: <br>
            <input type="text" name="alamat" placeholder="Masukkan Alamat"><br>
            Email: <br>
            <input type="email" name="email" placeholder="Masukkan Email"><br>
            <input type="submit" value="kirim">
        </form>
  
        <table border="1">
            <tr>
                <th>Nama</th>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?php echo $nim; ?></td>
            </tr>
            <tr>
                <th>Prodi</th>
                <td><?php echo $prodi; ?></td>
            </tr>
            <tr>
                <th>Angkatan</th>
                <td><?php echo $angkatan; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>\