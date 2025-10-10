<?php
// Pertanyaan 3.7.1
// Membuat array untuk menyimpan daftar produk dan harganya
$produk = [
    ["Menu"=>"Nasi Goreng","Harga"=> 15000],
    ["Menu"=>"Mie Ayam","Harga"=> 12000],
    ["Menu"=>"Ayam Geprek","Harga"=> 18000],
    ["Menu"=>"Es Teh Manis","Harga"=> 5000],
    ["Menu"=>"Jus Alpukat","Harga"=> 10000],
];
echo "Daftar Produk dan Harga : <br><br>";
foreach ($produk as $item) {
    echo $item["Menu"]."  : Rp. ".$item['Harga']."<br>";
}

// Pertanyaan 3.7.2
// fungsi yang menghitung rata-rata nilai
echo "<br> Rata-Rata Nilai Mahasiswa : <br>";
$mahasiswa = [
    ["nama" => "Andi", "nilai" => [80, 75, 90]],
    ["nama" => "Budi", "nilai" => [70, 85, 78]],
    ["nama" => "Citra", "nilai" => [88, 92, 95]],
];
function hitungRataRata($dataMahasiswa) {
    foreach ($dataMahasiswa as $mhs) {
        $total = array_sum($mhs["nilai"]); 
        $jumlah = count($mhs["nilai"]);    
        $rata = $total / $jumlah;         
        
        echo "Nama: " . $mhs["nama"] . "<br>";
        echo "Nilai: " . implode(", ", $mhs["nilai"]) . "<br>";
        echo "Rata-rata: " . number_format($rata, 2) . "<br><br>";
    }
}
hitungRataRata($mahasiswa);
?>
