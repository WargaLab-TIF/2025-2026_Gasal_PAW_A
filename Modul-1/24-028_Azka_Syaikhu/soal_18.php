<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 18</title>
</head>
<body>
    <?php 
    $nama = "Azka Syaikhu";
    $NIM = "240411100028";
    $umur = "20";
    $gender = "Laki-laki";
    $fakultas = "Teknik";
    $email = "Azkasyaikhu0917@gmail.com";

    ?>

    <table border="3" bgcolor="blue" align="center">
        <caption align="top">
            <b>Biodata Mahasiswa</b>
        </caption>
        <tr>
            <td>1.</td>
            <td>Nama</td>
            <td><?php echo $nama ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>NIM</td>
            <td><?php echo $NIM ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Umur</td>
            <td><?php echo $umur ?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Gender</td>
            <td><?php echo $gender ?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Fakultas</td>
            <td><?php echo $fakultas ?></td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Alamat Email</td>
            <td><?php echo $email ?></td>
        </tr>
    </table>
</body>
</html>