<?php
// Soal 10 - Program Kasir Sederhana
$total = 0;
do {
    echo "Menu: 1.Nasi Goreng(15000) 2.Mie Ayam(12000) 3.Sate Ayam(20000)\n";
    $menu = readline("Pilih menu (1-3): ");
    $jumlah = readline("Jumlah porsi: ");

    switch ($menu) {
        case 1:
            $harga = 15000;
            break;
        case 2:
            $harga = 12000;
            break;
        case 3:
            $harga = 20000;
            break;
        default:
            $harga = 0;
            echo "Menu tidak tersedia.\n";
    }

    $subtotal = $harga * $jumlah;
    $total += $subtotal;

    $ulang = readline("Tambah menu lain? (y/n): ");
} while ($ulang == 'y');

echo "Total yang harus dibayar: Rp$total\n";
?>

.. mengunakan php "c:\xampp\htdocs\PAW\pr2\soal10.php" ..
