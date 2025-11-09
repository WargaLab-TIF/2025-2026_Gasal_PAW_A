<?php
$nama="Safri Iwanussuyuf";
$nim=240411100170;
$mata_kuliah="Pengembangan Aplikasi Web";
$kelas="IF 3A";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Biodata</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nim</th>
            <th>Mata kuliah</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td><?=$nama?></td>
            <td><?=$nim?></td>
            <td><?=$mata_kuliah?></td>
            <td><?=$kelas?></td>
        </tr>
    </table>
</body>
</html>
