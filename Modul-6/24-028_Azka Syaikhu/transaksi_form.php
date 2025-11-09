<?php
require 'config.php';

// Ambil data barang untuk dropdown dan pelanggan untuk Master
$barang_list = [];
$barang_result = mysqli_query($conn, "SELECT id, nama_barang, harga, stok FROM barang WHERE stok > 0 ORDER BY nama_barang");
if ($barang_result) {
    $barang_list = mysqli_fetch_all($barang_result, MYSQLI_ASSOC);
}

$pelanggan_list = [];
$pelanggan_result = mysqli_query($conn, "SELECT id, nama FROM pelanggan ORDER BY nama");
if ($pelanggan_result) {
    $pelanggan_list = mysqli_fetch_all($pelanggan_result, MYSQLI_ASSOC);
}

$message = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Transaksi Master-Detail</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 900px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #007bff; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-bottom: 20px; }
        input, select, textarea { padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%; box-sizing: border-box; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #e6f7ff; }
        .btn-add { background-color: #ff9800; color: white; border: none; padding: 8px; border-radius: 4px; cursor: pointer; }
        .btn-submit { background-color: #28a745; color: white; border: none; padding: 10px; border-radius: 4px; cursor: pointer; margin-top: 20px; }
        #hiddenInputs { display: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Input Transaksi (Master-Detail)</h2>

    <?php if ($message) display_alert($message, strpos($message, 'Error') === 0 ? 'error' : 'success'); ?>

    <form id="mainForm" action="transaksi_store.php" method="POST">
        <h3>1. Data Master (Transaksi)</h3>
        <div class="grid">
            <div>
                <label>Pelanggan:</label>
                <select name="pelanggan_id" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach ($pelanggan_list as $p): ?>
                        <option value="<?= htmlspecialchars($p['id']); ?>"><?= htmlspecialchars($p['nama']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="grid-column: span 2;">
                <label>Keterangan:</label>
                <textarea name="keterangan" rows="1"></textarea>
            </div>
        </div>

        <h3>2. Tambah Detail Barang</h3>
        <div class="grid">
            <div>
                <label>Barang:</label>
                <select id="barang_select" required>
                    <option value="">-- Pilih Barang --</option>
                    <?php foreach ($barang_list as $b): ?>
                        <option value="<?= $b['id']; ?>" data-harga="<?= $b['harga']; ?>" data-stok="<?= $b['stok']; ?>">
                            <?= htmlspecialchars($b['nama_barang']); ?> (Stok: <?= $b['stok']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Qty:</label>
                <input type="number" id="qty_input" value="1" min="1" required>
            </div>
            <div>
                <label>&nbsp;</label>
                <button type="button" id="addItemBtn" class="btn-add">Tambah ke Keranjang</button>
            </div>
        </div>

        <h3>3. Keranjang Belanja (Rincian)</h3>
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Barang ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                </tbody>
        </table>
        
        <input type="hidden" name="total_transaksi" id="total_transaksi">
        <div id="hiddenInputs"></div>

        <button type="submit" class="btn-submit">Selesaikan Transaksi & Simpan</button>
    </form>
</div>

<script>
    let cart = [];
    const cartTableBody = document.querySelector('#cartTable tbody');
    const totalTransaksiInput = document.querySelector('#total_transaksi');
    const hiddenInputsDiv = document.querySelector('#hiddenInputs');
    const addItemBtn = document.querySelector('#addItemBtn');
    const barangSelect = document.querySelector('#barang_select');
    const qtyInput = document.querySelector('#qty_input');

    function renderHiddenInputs() { 
        hiddenInputsDiv.innerHTML = '';
        
        cart.forEach((item, index) => {
            // Input untuk ID Barang
            ['barang_id', 'harga', 'qty'].forEach(key => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `items[${index}][${key}]`;
                input.value = item[key];
                hiddenInputsDiv.appendChild(input);
            });
        });
    }

    function renderCart() {
        cartTableBody.innerHTML = '';
        let grandTotal = 0;

        if (cart.length === 0) {
            cartTableBody.innerHTML = '<tr><td colspan="6" style="text-align:center;">Keranjang kosong.</td></tr>';
            totalTransaksiInput.value = 0;
            renderHiddenInputs();
            return;
        }

        cart.forEach((item, index) => {
            const subtotal = item.harga * item.qty;
            grandTotal += subtotal;

            const row = cartTableBody.insertRow();
            row.innerHTML = `
                <td>${item.barang_id}</td>
                <td>${item.nama_barang}</td>
                <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                <td>${item.qty}</td>
                <td>Rp ${subtotal.toLocaleString('id-ID')}</td>
                <td><button type="button" class="btn-add" onclick="removeItem(${index})" style="background-color: #dc3545;">Hapus</button></td>
            `;
        });
        
        const totalRow = cartTableBody.insertRow();
        totalRow.innerHTML = `<td colspan="4" style="text-align:right; font-weight:bold;">GRAND TOTAL:</td>
                              <td colspan="2" style="font-weight:bold;">Rp ${grandTotal.toLocaleString('id-ID')}</td>`;
        
        totalTransaksiInput.value = grandTotal;
        renderHiddenInputs();
    }

    function removeItem(index) {
        cart.splice(index, 1);
        renderCart();
    }

    addItemBtn.addEventListener('click', () => {
        const selectedOption = barangSelect.options[barangSelect.selectedIndex];
        
        if (!barangSelect.value) {
            alert("Silakan pilih barang.");
            return;
        }

        const barangId = parseInt(barangSelect.value);
        const namaBarang = selectedOption.textContent.split(' (Stok')[0].trim();
        const harga = parseFloat(selectedOption.dataset.harga);
        const maxStok = parseInt(selectedOption.dataset.stok);
        const qty = parseInt(qtyInput.value);

        if (qty < 1) {
            alert("Jumlah (Qty) minimal 1.");
            return;
        }
        
        if (qty > maxStok) {
            alert("Stok tidak mencukupi. Stok tersedia: " + maxStok);
            return;
        }

        const existingItem = cart.find(item => item.barang_id === barangId);

        if (existingItem) {
             if (existingItem.qty + qty > maxStok) {
                 alert("Penambahan Qty melebihi stok yang tersedia!");
                 return;
             }
             existingItem.qty += qty;
        } else {
            cart.push({
                barang_id: barangId,
                nama_barang: namaBarang,
                harga: harga,
                qty: qty
            });
        }
        
        qtyInput.value = 1;
        renderCart();
    });

    renderCart();
</script>
</body>
</html>