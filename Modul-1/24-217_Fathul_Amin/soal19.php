<?php
$nama   = "Fathul Amin";
$nim    = "240411100217";
$prodi  = "Teknik Informatika, Fakultas teknik, UTM";
$alamat = "Sampang";
$umur   = "20";
?>

<!DOCTYPE html>
<html>
<head>
    <title>soal nomer 19</title>
</head>
<body>
    <h2>Biodata</h2>
    <table border="1" cellpadding="6">
        <tr>
            <th>Nama</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?php echo $umur; ?> tahun</td>
        </tr>
    </table>
</body>
</html>