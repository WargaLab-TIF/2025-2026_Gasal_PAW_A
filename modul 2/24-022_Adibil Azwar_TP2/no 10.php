<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 10</title>
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
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th, td {
            padding: 6px;
        }
        form {
            margin-top: 10px;
        }
        label {
            display: block;
            margin-top: 8px;
            margin-bottom: 3px;
            font-weight: bold;
            font-size: 14px;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        button {
            background: #1cde3cff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th colspan="3">Menu Makanan</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Nasi Goreng Seafood</td>
                <td>Rp45.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Chicken Cordon Bleu</td>
                <td>Rp53.000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Cumi Goreng Mentega</td>
                <td>Rp61.000</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Chicken Katsu Teriyaki</td>
                <td>Rp39.000</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Kwetiaw Sapi Goreng</td>
                <td>Rp48.000</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Capcai Seafood</td>
                <td>Rp48.000</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Nasi Fillet Ikan Goreng Mentega</td>
                <td>Rp54.000</td>
            </tr>
        </table>
        <form action="" method="post">
            <label for="menu">Menu</label>
            <select name="menu" id="menu">
                <option value="">Pilihan Menu Makanan</option>
                <option value="nasi_goreng_seafood">Nasi Goreng Seafood</option>
                <option value="chicken_cordon_bleu">Chicken Cordon Bleu</option>
                <option value="cumi_goreng_mentega">Cumi Goreng Mentega</option>
                <option value="chicken_katsu_teriyaki">Chicken Katsu Teriyaki</option>
                <option value="kwetiaw_sapi_goreng">Kwetiaw Sapi Goreng</option>
                <option value="capcai_seafood">Capcai Seafood</option>
                <option value="nasi_fillet_ikan_goreng_mentega">Nasi Fillet Ikan Goreng Mentega</option>
            </select>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>
            <button type="submit" name="tambah">Tambah Pesanan</button>
        </form>
        <form action="" method="post">
            <button type="submit" name="hitung">Harga Total</button>
        </form>

    <?php
    if (!isset($_SESSION['total'])){
        $_SESSION['total'] = 0;
    }
    if (isset($_POST['tambah'])){
        $menu = $_POST['menu'];
        $jumlah = $_POST['jumlah'];

        $harga = 0;
        if ($menu == "nasi_goreng_seafood"){
            $harga = 45000;
        }elseif ($menu == "chicken_cordon_bleu"){
            $harga = 53000;
        }elseif ($menu == "cumi_goreng_mentega"){
            $harga = 61000;
        }elseif ($menu == "chicken_katsu_teriyaki"){
            $harga = 39000;
        }elseif ($menu == "kwetiaw_sapi_goreng"){
            $harga = 48000;
        }elseif ($menu == "capcai_seafood"){
            $harga = 48000;
        }elseif ($menu == "nasi_fillet_ikan_goreng_mentega"){
            $harga = 54000;
        }

        if($menu != "" && $jumlah > 0){
            $subtotal = $harga * $jumlah;
            $_SESSION['total'] += $subtotal;
            echo "Berhasil ditambahkan $menu $jumlah<br>";
            echo "Total Sementara: Rp " . $_SESSION['total'];
        }
    }
    if (isset($_POST['hitung'])){
        echo "<strong>Total Pembelian: Rp ". $_SESSION['total']. "</strong>";
        $_SESSION['total']=0;
    }
    ?>
    </div>
</body>
</html>