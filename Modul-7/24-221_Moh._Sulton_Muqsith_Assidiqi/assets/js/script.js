flatpickr("#tanggal_awal", {
    dateFormat: "d/m/Y",
    locale: {
        firstDayOfWeek: 1
    }
});

flatpickr("#tanggal_akhir", {
    dateFormat: "d/m/Y",
    locale: {
        firstDayOfWeek: 1
    }
});

let chartPenjualan = null;
let dataLaporan = null;
let tanggalAwal = '';
let tanggalAkhir = '';

document.getElementById('filterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    tanggalAwal = document.getElementById('tanggal_awal').value;
    tanggalAkhir = document.getElementById('tanggal_akhir').value;
    
    // tanggal d/m/Y ke Y-m-d
    const partsAwal = tanggalAwal.split('/');
    const partsAkhir = tanggalAkhir.split('/');
    const tanggalAwalFormatted = `${partsAwal[2]}-${partsAwal[1]}-${partsAwal[0]}`;
    const tanggalAkhirFormatted = `${partsAkhir[2]}-${partsAkhir[1]}-${partsAkhir[0]}`;
    
    loadLaporan(tanggalAwalFormatted, tanggalAkhirFormatted);
});

function loadLaporan(tanggalAwal, tanggalAkhir) {
    fetch(`api/laporan.php?tanggal_awal=${tanggalAwal}&tanggal_akhir=${tanggalAkhir}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                dataLaporan = data;
                displayLaporan(data);
            } else {
                alert('Error: ' + (data.error || 'Gagal memuat data'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat data');
        });
}

function displayLaporan(data) {
    // section hasil laporan
    document.getElementById('hasilLaporan').style.display = 'block';
    
    const partsAwal = tanggalAwal.split('/');
    const partsAkhir = tanggalAkhir.split('/');
    // YYYY-MM-DD
    const tanggalAwalFormatted = `${partsAwal[2]}-${partsAwal[1]}-${partsAwal[0]}`;
    const tanggalAkhirFormatted = `${partsAkhir[2]}-${partsAkhir[1]}-${partsAkhir[0]}`;
    const judul = `Rekap Laporan Penjualan ${tanggalAwalFormatted} sampai ${tanggalAkhirFormatted}`;
    document.getElementById('judulLaporan').textContent = judul;
    
    // grafik
    createChart(data.data);
    
    // rekap tabel
    fillTable(data.data);
    
    // total
    document.getElementById('totalPelanggan').textContent = data.total.total_pelanggan + ' Orang';
    document.getElementById('totalPendapatan').textContent = formatRupiah(data.total.total_pendapatan);
    
    // hasil
    document.getElementById('hasilLaporan').scrollIntoView({ behavior: 'smooth' });
}

function createChart(data) {
    const ctx = document.getElementById('chartPenjualan').getContext('2d');
    
    if (chartPenjualan) {
        chartPenjualan.destroy();
    }
    
    const labels = data.map(item => item.tanggal);
    const totals = data.map(item => parseFloat(item.total));
    
    chartPenjualan = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: totals,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'RP. ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Total: RP. ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
}

function fillTable(data) {
    const tbody = document.getElementById('tbodyRekap');
    tbody.innerHTML = '';
    
    data.forEach((item, index) => {
        const row = document.createElement('tr');
        const tanggal = new Date(item.tanggal + 'T00:00:00');
        // 01 Sep 2023
        const day = String(tanggal.getDate()).padStart(2, '0');
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const month = monthNames[tanggal.getMonth()];
        const year = tanggal.getFullYear();
        const tanggalFormatted = `${day} ${month} ${year}`;
        
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>RP. ${parseFloat(item.total).toLocaleString('id-ID')}</td>
            <td>${tanggalFormatted}</td>
        `;
        tbody.appendChild(row);
    });
}

function formatRupiah(angka) {
    return 'RP. ' + parseFloat(angka).toLocaleString('id-ID');
}

function cetakLaporan() {
    window.print();
}

function exportExcel() {
    if (!dataLaporan) {
        alert('Tidak ada data untuk diexport');
        return;
    }
    
    // workbook
    const wb = XLSX.utils.book_new();
    
    // Data Excel
    const excelData = [];
    
    // Header
    const partsAwal = tanggalAwal.split('/');
    const partsAkhir = tanggalAkhir.split('/');
    const tanggalAwalFormatted = `${partsAwal[2]}-${partsAwal[1]}-${partsAwal[0]}`;
    const tanggalAkhirFormatted = `${partsAkhir[2]}-${partsAkhir[1]}-${partsAkhir[0]}`;
    
    excelData.push(['Rekap Laporan Penjualan ' + tanggalAwalFormatted + ' sampai']);
    excelData.push([tanggalAkhirFormatted]);
    excelData.push([]);
    excelData.push([]);
    excelData.push([]);
    excelData.push([]);
    excelData.push([]);
    excelData.push([]);
    excelData.push([]);
    
    // header tabel
    excelData.push(['No', 'Total', 'Tanggal']);
    
    // data tabel
    dataLaporan.data.forEach((item, index) => {
        const tanggal = new Date(item.tanggal + 'T00:00:00');
        // 01-Sep-23
        const day = String(tanggal.getDate()).padStart(2, '0');
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const month = monthNames[tanggal.getMonth()];
        const year = String(tanggal.getFullYear()).substring(2);
        const tanggalFormatted = `${day}-${month}-${year}`;
        
        excelData.push([
            index + 1,
            'RP. ' + parseFloat(item.total).toLocaleString('id-ID'),
            tanggalFormatted
        ]);
    });
    
    excelData.push([]);
    
    excelData.push(['Jumlah Pelanggan', '', 'Jumlah Pendapatan']);
    excelData.push([]);
    excelData.push([
        dataLaporan.total.total_pelanggan + ' Orang',
        '',
        'RP. ' + parseFloat(dataLaporan.total.total_pendapatan).toLocaleString('id-ID')
    ]);
    
    // worksheet
    const ws = XLSX.utils.aoa_to_sheet(excelData);
    
    // column widths
    ws['!cols'] = [
        { wch: 5 },
        { wch: 20 },
        { wch: 20 }
    ];
    
    // merge cells judul
    ws['!merges'] = [
        { s: { r: 0, c: 0 }, e: { r: 0, c: 2 } },
        { s: { r: 1, c: 0 }, e: { r: 1, c: 2 } }
    ];
    
    // tambahkan worksheet ke workbook
    XLSX.utils.book_append_sheet(wb, ws, 'Laporan Penjualan');
    
    // download file
    const filename = `Laporan_Penjualan_${tanggalAwalFormatted}_${tanggalAkhirFormatted}.xlsx`;
    XLSX.writeFile(wb, filename);
}

