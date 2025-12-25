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
            background: #2c7be5;
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
                <th colspan="3">Menu Minuman</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Hazelnut</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Red Velvet</td>
                <td>Rp23.000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Caramel</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Matcha</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Vanilla</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cappucino</td>
                <td>Rp22.000</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Lemon Tea</td>
                <td>Rp15.000</td>
            </tr>
        </table>
        <form action="" method="post">
            <label for="menu">Menu</label>
            <select name="menu" id="menu">
                <option value="">== Pilihan Minuman ==</option>
                <option value="hazelnut">Hazelnut</option>
                <option value="red_velvet">Red Velvet</option>
                <option value="caramel">Caramel</option>
                <option value="matcha">Matcha</option>
                <option value="vanilla">Vanilla</option>
                <option value="cappucino">Cappucino</option>
                <option value="lemon_tea">Lemon Tea</option>
            </select>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>
            <button type="submit" name="tambah">Tambah Barang</button>
        </form>
        <form action="" method="post">
            <button type="submit" name="hitung">Hitung Total</button>
        </form>

    <?php
    if (!isset($_SESSION['total'])){
        $_SESSION['total'] = 0;
    }
    if (isset($_POST['tambah'])){
        $menu = $_POST['menu'];
        $jumlah = $_POST['jumlah'];

        $harga = 0;
        if ($menu == "hazelnut"){
            $harga = 20000;
        }elseif ($menu == "red_velvet"){
            $harga = 23000;
        }elseif ($menu == "caramel"){
            $harga = 20000;
        }elseif ($menu == "matcha"){
            $harga = 20000;
        }elseif ($menu == "vanilla"){
            $harga = 20000;
        }elseif ($menu == "cappucino"){
            $harga = 22000;
        }elseif ($menu == "lemon_tea"){
            $harga = 15000;
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