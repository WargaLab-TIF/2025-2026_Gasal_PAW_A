<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Laporan Penjualan</h2>
        
        <!-- Filter Tanggal -->
        <div class="card mb-4">
            <div class="card-body">
                <form id="filterForm" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                        <input type="text" class="form-control" id="tanggal_awal" name="tanggal_awal" placeholder="Pilih tanggal awal" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="text" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Pilih tanggal akhir" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hasil Laporan -->
        <div id="hasilLaporan" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 id="judulLaporan" class="text-primary"></h4>
                <div>
                    <button onclick="window.history.back()" class="btn btn-secondary me-2">
                        < Kembali
                    </button>
                    <button onclick="cetakLaporan()" class="btn btn-warning me-2">
                        Cetak
                    </button>
                    <button onclick="exportExcel()" class="btn btn-warning">
                        Excel
                    </button>
                </div>
            </div>

            <!-- Grafik -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Grafik</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>

            <!-- Tabel Rekap -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Rekap</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tabelRekap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyRekap">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Total</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <strong>Jumlah Pelanggan</strong>
                                <h4 id="totalPelanggan" class="mt-2">0 Orang</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <strong>Jumlah Pendapatan</strong>
                                <h4 id="totalPendapatan" class="mt-2">RP. 0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

