<?php

include 'conn.php';

$query="SELECT * FROM suppliers";
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
            <th>nama</th>
            <th>telp</th>
            <th>alamat</th>
            <th>aksi</th>
        </tr>
        <?php foreach ($result as $key => $value) :?>
            <tr>
                <td><?=$value['id']?></td>
                <td><?=$value['nama']?></td>
                <td><?=$value['telp']?></td>
                <td><?=$value['alamat']?></td>
                <td><a href="hapus_data_supplier.php?id=<?= $value['id']?>" >Hapus</a></td>
            </tr>
        <?php endforeach?>

    </table>
</body>
</html>