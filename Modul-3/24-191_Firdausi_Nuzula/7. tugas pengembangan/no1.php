<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>

    <h2>Daftar Produk IPhone</h2>

    <?php
    $produk = array(
        "IPhone XR Pro" => 12500000,
        "IPhone 11 Pro" => 35000000,
        "IPhone 12 Pro" => 65000000,
        "IPhone 13 Pro" => 210000000,
        "IPhone 15 Pro" => 475000000
    );
    ?>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
        </tr>
        <?php
        foreach ($produk as $nama_produk => $harga) {
            echo "<tr>";
            echo "<td>" . $nama_produk . "</td>";
            echo "<td>Rp " . number_format($harga, 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
