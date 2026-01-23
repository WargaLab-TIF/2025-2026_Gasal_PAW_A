    <?php
    require 'soal1.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama   = $_POST['nama'];
        $telp   = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO supplier (nama, telp, alamat)
                VALUES ('$nama', '$telp', '$alamat')";

        if (mysqli_query($conn, $sql)) {
            header("Location: 1.1.php"); // balik ke halaman utama
            exit;
        } else {
            echo "gagal menambah data: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
    <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>tambah supplier</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background-color: #f4f4f4;
    }
    .container {
        width: 400px;
        background: #fff;
        padding: 30px 40px;
        margin: 60px auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 { text-align:center; margin-bottom:20px; }
    label { display:block; margin-top:10px; font-weight:bold; }
    input, textarea {
        width:100%; padding:8px; margin-top:5px;
        border:1px solid #ccc; border-radius:4px;
    }
    button, .back {
        margin-top:15px; padding:8px 14px; border:none;
        border-radius:4px; cursor:pointer;
    }
    button { background-color:#007bff; color:white; }
    button:hover { background-color:#0056b3; }
    .back {
        background-color:#ccc; color:black; text-decoration:none;
        display:inline-block; margin-left:5px;
    }
    .back:hover { background-color:#aaa; }
    </style>
    </head>
    <body>

    <div class="container">
        <h2>tambah data supplier</h2>
        <form method="post" action="">
            <label>nama:</label>
            <input type="text" name="nama" required>

            <label>telepon:</label>
            <input type="text" name="telp" required>

            <label>alamat:</label>
            <textarea name="alamat" rows="3" required></textarea>

            <button type="submit">simpan</button>
            <a href="1.1.php" class="back">batal</a>
        </form>
    </div>

    </body>
    </html>
