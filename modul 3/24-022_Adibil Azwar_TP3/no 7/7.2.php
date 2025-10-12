<?php
function RataRata($mahasiswa){
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
        "nim" => 240411100022, 
        "nama" => "Adibil Azwar", 
        "nilai" => [100, 97, 85]
    ], 
    [ 
        "nim" => 240411100028, 
        "nama" => "Azka Syaikhu", 
        "nilai" => [99, 88, 77]
    ],
    [ 
        "nim" => 240411100026, 
        "nama" => "Belva Hasya", 
        "nilai" => [88, 97, 80]
    ],
    [ 
        "nim" => 240411100666, 
        "nama" => "Uqi Edwerd", 
        "nilai" => [80, 81, 79]
    ],
    [ 
        "nim" => 240411100001, 
        "nama" => "Abul", 
        "nilai" => [60, 92, 90]
    ]
]; 
$RataKeseluruhan = RataRata($mahasiswa);
echo "Nilai Rata-Rata Keseluruhan semua mahasiswa adalah ". round($RataKeseluruhan);
?>