<?php

$mahasiswa = [
    0 => [
        'nama' => 'jayro',
        'nim' => 111111,
        'no.hp' => '081222344352'
    ],
    1 => [
        'nama' => 'budi',
        'nim' => 222222,
        'no.hp' => '081234252683'
    ],
    2 => [
        'nama' => 'yanto',
        'nim' => 333333,
        'no.hp' => '081245272571'
    ]
];


$mahasiswa[count($mahasiswa)] = [
        'nama' => 'satria',
        'nim' => 444444,
        'no.hp' => '081245272571'
];
$mahasiswa[count($mahasiswa)] = [
        'nama' => 'bagas',
        'nim' => 555555,
        'no.hp' => '081245272571'
];
$mahasiswa[count($mahasiswa)] = [
        'nama' => 'siti',
        'nim' => 666666,
        'no.hp' => '081245272571'
];
$mahasiswa[count($mahasiswa)] = [
        'nama' => 'santi',
        'nim' => 777777,
        'no.hp' => '081245272571'
];
$mahasiswa[count($mahasiswa)] = [
        'nama' => 'jeki',
        'nim' => 888888,
        'no.hp' => '081245272571'
];

echo '<h1>data mahasiswa</h1>';

echo "<table border='1px' cellpadding='5px'>";
echo "<tr><th>nama</th><th>NIM</th><th>nomor hp</th></tr>";
for ($i=0; $i < count($mahasiswa); $i++) {
    echo "<tr>";
    foreach ($mahasiswa[$i] as $key => $value) {
        echo "<td>$value&nbsp&nbsp&nbsp</td>";
    }
    echo "</tr>";
}
echo "</table>";