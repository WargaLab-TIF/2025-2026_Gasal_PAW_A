<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 10</title>
</head>
<body>
        <table border="1">
            <tr>
                <th colspan="3">Coffe Menu</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Americano</td>
                <td>Rp15.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caramel Latte</td>
                <td>Rp18.000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Machiato</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Longblack</td>
                <td>Rp18.000</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Vanilla latte</td>
                <td>Rp20.000</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Avocado caramel</td>
                <td>Rp18.000</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Kopi Tubruk</td>
                <td>Rp15.000</td>
            </tr>
        </table>
        <form action="" method="post">
            <label for="menu">Menu</label>
            <select name="menu" id="menu">
                <option value="">== Pilihan Minuman ==</option>
                <option value="americano">Americano</option>
                <option value="caramel_latte">Caramel Latte</option>
                <option value="machiato">Machiato</option>
                <option value="longblack">Longblack</option>
                <option value="vanilla_latte">Vanilla latte</option>
                <option value="avocado_caramel">Avocado caramel</option>
                <option value="kopi_tubruk">Kopi tubruk</option>
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
        if ($menu == "americano"){
            $harga = 15000;
        }elseif ($menu == "caramel_latte"){
            $harga = 18000;
        }elseif ($menu == "machiato"){
            $harga = 20000;
        }elseif ($menu == "longblack"){
            $harga = 18000;
        }elseif ($menu == "vanilla_latte"){
            $harga = 20000;
        }elseif ($menu == "avocado_caramel"){
            $harga = 18000;
        }elseif ($menu == "kopi_tubruk"){
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