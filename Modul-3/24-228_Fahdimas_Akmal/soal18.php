<?php
// Menggunakan array asosiatif untuk menyimpan produk dan harga
$products = array(
    "Buku Tulis" => 5000,
    "Pensil 2B" => 1500,
    "Penghapus" => 1000,
    "Penggaris 30cm" => 2500,
    "Spidol Hitam" => 8000
);

echo "<h2>Daftar Produk dan Harganya</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga (Rp)</th>
        </tr>
      </thead>";
echo "<tbody>";

// Menampilkan setiap produk dan harga menggunakan foreach
foreach ($products as $product_name => $price) {
    echo "<tr>";
    echo "<td>" . $product_name . "</td>";
    echo "<td>" . number_format($price, 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
