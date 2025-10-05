<?php
session_start();

if (!isset($_SESSION['total']) && !isset($_SESSION['total'])) {
    $_SESSION['rental'] = '';
    $_SESSION['total'] = 0;

}

function harga($nama){
    switch ($nama) {
        case "vario":
            return 100000;
        case "beat":
            return 50000;
        case "pcx":
            return 200000;
        case "adv":
            return 150000;
        default:
            return 0;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['motor'] != 'kosong'){
        $_SESSION['rental'] .= $_POST['motor'] . " Rp" . harga($_POST['motor']) . '<br>';
        $_SESSION['total'] += harga($_POST['motor']);
    }

    if (isset($_POST['clear'])){
        $_SESSION['rental'] = '';
        $_SESSION['total'] = 0;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasir</title>
</head>

<body>
    <h2>RENT KITA</h2>
    <form method="post">
        <label for="motor">pilih motor anda </label>
        <select name="motor" id="motor">
            <option value="kosong">--Pilih Motor--</option>
            <option value="beat">beat</option>
            <option value="adv">adv
            </option>
            <option value="vario">variom</option>
            <option value="pcx">pcx
            </option>
        </select><br>
        <label for="clear">bersihkan</label>
        <input type="checkbox" name="clear" id="clear"><br><br>
        <button type="submit">kirim</button>
        
    </form>
    <?php if ($_SESSION['rental'] != '' && $_SESSION['total'] != 0):?>
        <br><br>
        <table border="1px">
            <tr>
                <th><h4>RENT KITA</h4></th>
            </tr>
            <tr>
                <th>Rincian Harga</th>
            </tr>
            <tr>
                <td><?= $_SESSION['rental'];?></td>
            </tr>
            <tr>
                <th>Total</th>
            </tr>
            <tr>
                <td><?= "Total =  Rp" . $_SESSION['total'];?></td>
            </tr>
        </table>
    <?php endif ?>
</body>
</html>