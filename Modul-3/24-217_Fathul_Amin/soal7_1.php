<?php
$daftarProduk = array(
    "Helm" => 90000,
    "jas hujan" => 25000,
    "Ban" => 300000
);

$daftarProduk["kampas"] = 35000;
$daftarProduk["spion"]  = 30000;

echo "<table border='1' cellpadding='6'>";
echo "<tr><th>Nama Produk</th><th>Harga (Rp)</th></tr>";

foreach ($daftarProduk as $namaProduk => $hargaProduk) {
    echo "<tr>";
    echo "<td>$namaProduk</td>";
    echo "<td>" . number_format($hargaProduk, 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
