<?php

include 'conn.php';

$query="SELECT * FROM barang as b JOIN suppliers as s ON b.supplier_id = s.id";
$execute=mysqli_query($conn,$query);
$result=mysqli_fetch_all($execute, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>id</th>
            <th>kode_barang</th>
            <th>nama_barang</th>
            <th>harga</th>
            <th>stok</th>
            <th>nama</th>
        </tr>
        <?php foreach ($result as $key => $value) :?>
            <tr>
                <th><?=$value['id']?></th>
                <th><?=$value['kode_barang']?></th>
                <th><?=$value['nama_barang']?></th>
                <th><?=$value['harga']?></th>
                <th><?=$value['stok']?></th>
                <th><?=$value['nama']?></th>
            </tr>
        <?php endforeach?>

    </table>
</body>
</html>