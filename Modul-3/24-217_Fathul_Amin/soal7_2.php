<?php
// Membuat array berisi nama dan nilai-nilai mahasiswa
$dataMahasiswa = array(
    array("Sandy", 80, 75, 90),
    array("Bica", 70, 85, 78),
    array("Riyla", 88, 92, 81),
    array("Dani", 60, 70, 65)
);

foreach ($dataMahasiswa as $mahasiswa) {
    $nama = $mahasiswa[0];        
    $nilai1 = $mahasiswa[1];      
    $nilai2 = $mahasiswa[2];      
    $nilai3 = $mahasiswa[3];      

    $rata = ($nilai1 + $nilai2 + $nilai3) / 3;

    echo "Rata-rata nilai $nama adalah : $rata <br>";
}
?>