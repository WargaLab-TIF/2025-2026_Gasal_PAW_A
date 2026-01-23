<?php
require "conn.php";
$result_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$result_barang = mysqli_query($conn, "SELECT * FROM barang");


$options_barang = "";
while ($row = mysqli_fetch_assoc($result_barang)) {
    $options_barang .= "<option value='" . $row['id'] . "' data-harga='" . $row['harga'] . "'>" . $row['nama_barang'] . "</option>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Transaksi</title>
    <style>
        .master, .detail { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 5px; }
        .btn { padding: 5px 10px; }
        .btn-danger { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

    <h2>Form Input Transaksi</h2>
    
    <form action="simpan_transaksi.php" method="POST">
        
        <div class="master">
            <h3>Data Master (Nota)</h3>
            <label>Pelanggan:</label>
            <select name="pelanggan_id" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
                    echo "<option value='" . $row_pelanggan['id'] . "'>" . $row_pelanggan['nama'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label>Keterangan:</label>
            <input type="text" name="keterangan" placeholder="Keterangan Nota">
        </div>

        <div class="detail">
            <h3>Data Detail (Barang)</h3>
            <table id="tabel_detail">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    </tbody>
            </table>
            <button type="button" class="btn" onclick="tambahBaris()">+ Tambah Barang</button>
            
            <div style="float: right; font-weight: bold;">
                Total: <span id="total_harga">0</span>
                <input type="hidden" name="total" id="input_total_harga" value="0">
            </div>
        </div>
        
        <button type="submit" class="btn">Simpan Transaksi</button>
    </form>

<script>
    const optionsBarang = '<?php echo addslashes($options_barang); ?>';

    function tambahBaris() {
        const tabel = document.getElementById('tabel_detail').getElementsByTagName('tbody')[0];
        const barisBaru = tabel.insertRow();
        
        barisBaru.innerHTML = `
            <td>
                <select name="barang_id[]" onchange="updateHarga(this)" required>
                    <option value="">-- Pilih Barang --</option>
                    ${optionsBarang}
                </select>
            </td>
            <td><input type="number" name="harga[]" class="harga"></td>
            <td><input type="number" name="qty[]" class="qty" oninput="hitungSubtotal(this)" value="1" min="1" required></td>
            <td><span class="subtotal">0</span></td>
            <td><button type="button" class="btn btn-danger" onclick="hapusBaris(this)">Hapus</button></td>
        `;
    }

    function hapusBaris(btn) {
        btn.closest('tr').remove();
        hitungTotalKeseluruhan();
    }

    function updateHarga(selectElement) {
        const baris = selectElement.closest('tr');
        const hargaInput = baris.querySelector('.harga');
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga') || 0;
        
        hargaInput.value = harga;
        hitungSubtotal(selectElement); 
    }

    function hitungSubtotal(element) {
        const baris = element.closest('tr');
        const harga = parseFloat(baris.querySelector('.harga').value) || 0;
        const qty = parseFloat(baris.querySelector('.qty').value) || 0;
        const subtotal = harga * qty;
        
        baris.querySelector('.subtotal').textContent = subtotal;
        hitungTotalKeseluruhan();
    }

    function hitungTotalKeseluruhan() {
        let total = 0;
        const semuaSubtotal = document.querySelectorAll('.subtotal');
        
        semuaSubtotal.forEach(function(span) {
            total += parseFloat(span.textContent) || 0;
        });
        
        document.getElementById('total_harga').textContent = total;
        document.getElementById('input_total_harga').value = total;
    }

    window.onload = tambahBaris;
</script>

</body>
</html>
<?php
mysqli_close($conn);
?>