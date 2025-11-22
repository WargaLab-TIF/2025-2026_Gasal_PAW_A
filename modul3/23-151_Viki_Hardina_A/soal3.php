<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    
<h2>kode soal </h2>
    <?php
$students = array
(
array("Alex","220401","0812345678"),
array("Bianca","220402","0812345687"),
array("Candice","220403","0812345665"),
);
for ($row = 0; $row < 3; $row++) {
echo "<p><b>Row number $row</b></p>";
echo "<ul>";
for ($col = 0; $col < 3; $col++) {
echo "<li>".$students[$row][$col]."</li>";
}
echo "</ul>";
}
?>
<h2>Menambahkan lima data baru dalam array Lstudents</h2>
   <?php
$Lstudents = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("Daniel","220404","0812345690"),
    array("Elena","220405","0812345611"),
    array("Felix","220406","0812345622"),
    array("Grace","220407","0812345633"),
    array("Hugo","220408","0812345644")
);
?>

<h2>Tampilkan data Lstudents dalam bentuk tabel</h2>
<?php
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
foreach($Lstudents as $s){
    echo "<tr>";
    echo "<td>".$s[0]."</td><td>".$s[1]."</td><td>".$s[2]."</td>";
    echo "</tr>";
}
echo "</table>";
?>


</body>
</html>