<?php
session_start();
$_SESSION['menu'] =[
    "minuman" => [
        'es teh' => 3000,
        'es jeruk' => 4000
    ],
    "makanan" => [
        'sate' => 15000,
        'soto' => 8000
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko</title>
</head>
<body>
    <form method="post">
        <label for="jenis">jenis menu :
            <input type="radio" name="jenis" id="jenis1" value="minuman" checked> Minuman
            <input type="radio" name="jenis" id="jenis2" value="makanan"> Makanan
        </label><br><br>
        <label for="NItem">nama item :
            <input type="text" name="NItem" id="NItem">
        </label><br><br>
        <label for="harga">harga item :
            <input type="number" name="harga" id="harga">
        </label><br><br>
        <button type="submit">tambah</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION['menu']) && $_POST['NItem'] != '' && $_POST['harga'] != ''){
            $_SESSION['menu'][$_POST['jenis']][$_POST['NItem']] = $_POST['harga'];
        }
    }
    ?>
    <hr><br>
</body>
</html>

<?php
echo '<table border="1px" cellpadding="5px">
<tr>
<th>jenis</th>
<th>nama item</th>
<th>harga item</th>
</tr>
';
foreach ($_SESSION['menu'] as $jenis => $items) {
    $isFirstItem = true;
    foreach ($items as $namaItem => $hargaItem) {
        echo "<tr>";
        if ($isFirstItem) {
            $rowspanCount = count($items);
            echo "<td rowspan=" . $rowspanCount . "><b>$jenis</b></td>";
        }
        echo "<td>$namaItem</td>";
        echo "<td>$hargaItem</td>";
        echo "</tr>";
        $isFirstItem = false;
    }
}
echo '</table>';
?>