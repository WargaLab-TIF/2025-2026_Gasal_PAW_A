<?php
require '../conn.php';
session_start();

$Q = "SELECT t.waktu_transaksi, SUM(td.harga) as total_harga FROM transaksi as t JOIN transaksi_detail as td ON t.id = td.transaksi_id GROUP BY transaksi_id";

$exe = mysqli_query($conn, $Q);
$has = mysqli_fetch_all($exe, MYSQLI_ASSOC);

$tg = [];
$t_harga = [];
$data = [];
if (isset($_POST['date_first']) && isset($_POST['date_last']) && $_POST['date_first'] > $_POST['date_last']) {
    $_SESSION['date_first'] = null;
    $_SESSION['date_last'] = null;
    echo '<script>alert("Input tanggal salah");</script>'; // Menggunakan alert dari logic asli Anda
} else {
    $_SESSION['date_first'] = $_POST['date_first'] ?? null;
    $_SESSION['date_last'] = $_POST['date_last'] ?? null;
}

foreach ($has as $key => $value) {
    if (isset($_POST['date_first'], $_POST['date_last']) && !empty($_SESSION['date_first']) && !empty($_SESSION['date_last'])) {
        if ($value['waktu_transaksi'] >= $_SESSION['date_first'] && $value['waktu_transaksi'] <= $_SESSION['date_last']) {
            $tg[] = $value['waktu_transaksi'];
            $t_harga[] = $value['total_harga'];
            $data[] = $value;
        }
    } else {
        $tg[] = $value['waktu_transaksi'];
        $t_harga[] = $value['total_harga'];
        $data[] = $value;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <!-- Memuat Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Memuat Font Inter (Masih dipakai untuk font-family) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS BIASA (STANDAR) -->
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Latar belakang abu-abu muda */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1152px; /* 6xl */
            margin: 0 auto;
            padding: 24px;
        }

        /* Judul */
        h1 {
            font-size: 1.5rem; /* 2xl */
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        h2 {
            font-size: 1.125rem; /* text-lg */
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem; /* Menambahkan margin atas untuk 'Total' */
        }
        
        h2:first-child {
            margin-top: 0; /* Hapus margin atas untuk h2 pertama di card */
        }

        /* Grup Tombol Aksi */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem; /* space-x-2 */
            margin-bottom: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem; /* px-4 py-2 */
            font-size: 0.875rem; /* text-sm */
            font-weight: 500;
            border-radius: 0.375rem; /* rounded-md */
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
            line-height: 1.25rem;
        }

        .btn-primary {
            background-color: #3b82f6; /* bg-blue-500 */
            color: white;
        }
        .btn-primary:hover {
            background-color: #2563eb; /* hover:bg-blue-600 */
        }

        .btn-secondary {
            background-color: white;
            color: #374151; /* text-gray-700 */
            border-color: #d1d5db; /* border-gray-300 */
        }
        .btn-secondary:hover {
            background-color: #f9fafb; /* hover:bg-gray-50 */
        }

        .btn-success {
            background-color: #22c55e; /* bg-green-500 */
            color: white;
        }
        .btn-success:hover {
            background-color: #16a34a; /* hover:bg-green-600 */
        }

        /* Form Filter */
        .filter-form-container {
            background-color: #f3f4f6; /* bg-gray-100 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* shadow-sm */
            margin-bottom: 1.5rem;
            border: 1px solid #e5e7eb; /* border-gray-200 */
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 0.75rem; /* space-x-3 */
            flex-wrap: wrap; /* Agar responsif di layar kecil */
        }

        .filter-form label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .filter-form input[type='date'] {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem;
            font-size: 0.875rem;
        }

        /* Card (Untuk Grafik dan Tabel) */
        .card {
            background-color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow-md */
            margin-bottom: 1.5rem;
        }

        /* Tabel */
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table th, table td {
            padding: 0.75rem; /* p-3 */
            font-size: 0.875rem; /* text-sm */
            border-bottom: 1px solid #e5e7eb; /* border-b border-gray-200 */
            color: #374151; /* text-gray-700 */
        }

        table th {
            background-color: #dbeafe; /* bg-blue-100 */
            color: #1e40af; /* text-blue-800 */
            font-weight: 600; /* semibold */
            border-bottom-color: #d1d5db; /* border-gray-300 */
        }

        table tbody tr:nth-child(even) {
            background-color: #f9fafb; /* even:bg-gray-50 */
        }

        table tbody tr:hover {
            background-color: #f3f4f6; /* hover:bg-gray-100 */
        }

        #total-table {
            width: 100%;
        }

        /* Media Queries */
        @media (min-width: 640px) {
            #total-table {
                width: 50%; /* sm:w-1/2 */
            }
        }

        /* CSS untuk menyembunyikan elemen saat print */
        @media print {
            .no-print {
                display: none;
            }
            body {
                background-color: white;
            }
            .container {
                padding: 0;
                margin: 0;
                max-width: 100%;
            }
            .card {
                box-shadow: none;
                border: 1px solid #e5e7eb;
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Judul Laporan -->
        <h1>Rekap Laporan Penjualan</h1>

        <!-- Grup Tombol Aksi -->
        <div class="action-buttons no-print">
            <!-- Tombol Cetak -->
            <button onclick="window.print()" class="btn btn-secondary">
                Cetak
            </button>
            <!-- Tombol Excel -->
            <a href="./exel_cetak.php" class="btn btn-secondary">
                Excel
            </a>
        </div>

        <!-- Form Filter Tanggal -->
        <div class="filter-form-container no-print">
            <form action="#" method="post" class="filter-form">
                <label for="date_first">Mulai</label>
                <input type="date" name="date_first" id="date_first">
                
                <label for="date_last">Sampai</label>
                <input type="date" name="date_last" id="date_last">
                
                <button type="submit" class="btn btn-success">
                    Tampilkan
                </button>
            </form>
        </div>

        <!-- Grafik -->
        <div class="card">
            <h2>Grafik Penjualan</h2>
            <canvas id="my_canvas"></canvas>
        </div>

        <!-- Tabel Rekap dan Total -->
        <div class="card">
            
            <!-- Tabel Rekap -->
            <h2>Rekap</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <!-- Mengembalikan header tabel asli Anda -->
                            <th>no</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        $hasil = 0 ?>
                        <?php for ($i = 0; $i < count($tg); $i++) { ?>
                            <?php $no++ ?>
                            <!-- Mengembalikan logic perulangan dan tampilan data asli Anda -->
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= 'Rp ' . $t_harga[$i] ?></td>
                                <td><?= $tg[$i] ?></td>
                                <?php $hasil += $t_harga[$i] ?>
                            </tr>
                        <?php } ?>
                        <?php if (empty($tg)) : // Menggunakan $tg untuk cek, sesuai logic asli ?>
                            <tr>
                                <td colspan="3" style="text-align: center; color: #6b7280;">Tidak ada data untuk ditampilkan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tabel Jumlah -->
            <h2>Total</h2>
            <table id="total-table">
                <thead>
                    <tr>
                        <th>Jumlah Pelanggan</th>
                        <th>Jumlah Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Mengembalikan logic total asli Anda -->
                        <td><?= count($tg) . ' orang' ?></td>
                        <td><?= 'Rp' . $hasil ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('my_canvas');

        // Mengembalikan logic Chart.js asli Anda
        const canvas = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tg) ?>,
                datasets: [{
                    label: 'penjualan',
                    data: <?= json_encode($t_harga) ?>,
                    borderWidth: 1,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Menambahkan warna agar tidak hitam putih
                    borderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
                // Menghapus kustomisasi 'options' saya
            }
        });
    </script>
</body>

</html>