<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="soal9.php" method="post">
        <p>Masukkan Nilai Anda</p>
        <input type="number" name="nilai">
        <input type="submit" value="kirim">
    </form>

<?php
$nilai=$_POST["nilai"]??"";

if ($nilai>80) {
    echo "Nilai anda A";
}
else if ($nilai>=70) {
    echo "Nilai anda B";
}
else if ($nilai>=60) {
    echo "Nilai anda C";
}
else if ($nilai>=50) {
    echo "Nilai anda D";
}else if($nilai>=0 && nilai<50){
    echo "Nilai anda E";
}else {
    echo "belum input nilai";
}
?>
</body>
</html>