<?php
$mahas = [
    [
        "nama" => 'Budi Santoso',
        'Nim' => '240601221',
        'nilai' => [
            'jarkom' => 85,
            'paw' => 92,
            'pbo' => 78,
            'basdat' => 95
        ],
        'rr' => ''
    ],
    [
        "nama" => 'Siti Aminah',
        'Nim' => '240601234',
        'nilai' => [
            'jarkom' => 77,
            'paw' => 88,
            'pbo' => 91,
            'basdat' => 82
        ],
        'rr' => ''
    ],
    [
        "nama" => 'Eko Prasetyo',
        'Nim' => '240601258',
        'nilai' => [
            'jarkom' => 96,
            'paw' => 85,
            'pbo' => 89,
            'basdat' => 79
        ],
        'rr' => ''
    ]
];

function hitungRR($array){
    $hasil = 0;
    foreach ($array as $key => $value) {
        $hasil += $value;
    }
    return $hasil/count($array);
}

for ($i=0; $i < count($mahas) ; $i++) {
    $mahas[$i]['rr'] = hitungRR($mahas[$i]['nilai']);
}


echo '<h1>Nilai Mahasiswa</h1>
<table border="1px" cellpadding="5px">
<tr>
<th rowspan="2">nama</th>
<th rowspan="2">nim</th>
<th colspan="4">NILAI</th>
<th rowspan="2">rata rata</th>
</tr>
<tr>
<th>jarkom</th>
<th>paw</th>
<th>pbo</th>
<th>basdat</th>
</tr>
';
for ($i=0; $i < count($mahas) ; $i++) {
    echo '<tr>';
    foreach ($mahas[$i] as $key => $value) {
        if ($key == 'nilai'){
            foreach ($mahas[$i][$key] as $k => $v) {
                echo "<td>$v</td>";
            }
        }else {
            echo "<td>$value</td>";
        }
    }
    echo '</tr>';
}


echo '</table>';

