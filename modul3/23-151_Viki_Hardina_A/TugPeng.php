<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h2>Array daftar produk dan harga</h2>
<?php
$produk = array(
    "Sabun" => 5000,
    "Shampoo" => 12000,
    "Odol" => 8000,
    "Sikat Gigi" => 6000
);

foreach($produk as $nama => $harga){
    echo "$nama : Rp $harga<br>";
}
?>


<h2>Hitung rata-rata nilai dari array multidimensi mahasiswa</h2>

<?php
$nilai = array(
    array("Ani", 80, 85, 90),
    array("Budi", 70, 75, 80),
    array("Citra", 85, 90, 88)
);

foreach($nilai as $mhs){
    $rata = ($mhs[1] + $mhs[2] + $mhs[3]) / 3;
    echo $mhs[0] . " : Rata-rata = " . number_format($rata, 2) . "<br>";
}
?>

<?php
$nilai = array(
    array("Ani", 80, 85, 90),
    array("Budi", 70, 75, 80),
    array("Citra", 85, 90, 88)
);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata-rata</th></tr>";

foreach($nilai as $mhs){
    $rata = ($mhs[1] + $mhs[2] + $mhs[3]) / 3;
    echo "<tr>";
    echo "<td>".$mhs[0]."</td>";
    echo "<td>".$mhs[1]."</td>";
    echo "<td>".$mhs[2]."</td>";
    echo "<td>".$mhs[3]."</td>";
    echo "<td>".number_format($rata, 2)."</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>