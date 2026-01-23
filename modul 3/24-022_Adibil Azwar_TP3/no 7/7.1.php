<?php
$shop = array(
    "product" => array("Laptop", "Smartphone", "Tablet"),
    "harga"   => array("15.000.000", "7.000.000", "5.000.000"),
);

echo "<table border='1'>";
echo "<tr><th>Product</th><th>Harga</th></tr>";

for ($i = 0; $i < count($shop["product"]); $i++) {
    echo "<tr>";
    echo "<td>" . $shop["product"][$i] . "</td>";
    echo "<td>" . $shop["harga"][$i] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>