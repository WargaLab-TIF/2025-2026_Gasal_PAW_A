<?php

$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

array_push(
    $students,
    array("Daniel", "220404", "0812345611"),
    array("Ella", "220405", "0812345622"),
    array("Fiona", "220406", "0812345633"),
    array("George", "220407", "0812345644"),
    array("Harry", "220408", "0812345655")
);



echo "<table border='1' cellpadding='5'>
<tr><th>Nama</th><th>NIM</th><th>Mobile</th></tr>";
foreach ($students as $row) {
    echo "<tr>";
    foreach ($row as $col) {
        echo "<td>$col</td>";
    }
    echo "</tr>";
}
echo "</table><br>";

?>