<?php 
function RataSeluruh($mahasiswa){
    $total_nilai = 0;
    $jumlah_mahasiswa = 0;

    foreach ($mahasiswa as $mh){
        foreach ($mh['nilai'] as $nilai){
            $total_nilai+=$nilai;
            $jumlah_mahasiswa++;
        }
    }
    if ($jumlah_mahasiswa > 0){
        return $total_nilai / $jumlah_mahasiswa;
    }else{
        return 0;
    }
};

$mahasiswa = [ 
    [ 
        "nim" => 240411100169, 
        "nama" => "Nurhabibatul Umah", 
        "nilai" => [80, 87, 85]
    ], 
    [ 
        "nim" => 240411100158, 
        "nama" => "Andini Syarif", 
        "nilai" => [99, 88, 77]
    ],
    [ 
        "nim" => 240411100177, 
        "nama" => "Firdausi", 
        "nilai" => [67, 97, 60]
    ],
    [ 
        "nim" => 240411100190, 
        "nama" => "Wifa Arsya", 
        "nilai" => [87, 88, 56]
    ],
    [ 
        "nim" => 240411100001, 
        "nama" => "Abidin", 
        "nilai" => [60, 77, 90]
    ]
]; 

echo "<table border='1'>";
echo "<tr><th>NIM</th><th>Name</th><th>Nilai</th></tr>";
foreach ($mahasiswa as $s){
    echo "<tr>";
    // echo "<td>". $s . "</td>";
    foreach ($s as $val=>$n){
        if ($val === 'nilai'){
            echo "<td>". implode("|", $n). "</td>";
        }else{
            echo "<td>". $n. "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
echo "<br>";

$RataKeseluruhan = RataSeluruh($mahasiswa);
echo "Nilai Rata-Rata Keseluruhan semua mahasiswa adalah ". round($RataKeseluruhan);
?> 