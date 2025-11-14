<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            color: #2c3e50;
        }
        select {
            padding: 5px;
            margin-bottom: 15px;
        }
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        button{
            background-color: #7d7878ff;
            border: none;
            color: white;
            padding: 7px 20px;
            text-align: center;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Form Transaksi Pembelian Barang</h2>
    <form action="" method="post">
        <label for="tgl">Tanggal Transaksi</label>
        <input type="date" name="tgl" id="tgl" value="<?= date ('Y-m-d'); ?>" readonly>
        <br><br>
        <label for="id_pelanggan">ID Pelanggan</label>
        <select name="id" id="id" required>
            <option value="">Pilih ID Pelanggan</option>
            <?php
            $id = mysqli_query($conn, "SELECT id FROM pelanggan");
                while ($row = mysqli_fetch_assoc($id)){
                    $selected = ($_POST['id'] ?? '') == $row['id'] ? 'selected' :'';
                        echo "<option value='{$row['id']}' $selected>{$row['id']}</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" name="pilih" value="Kirim">
    </form>

    <?php
    if (isset($_POST['pilih'])){
    ?>

    <form action="simpan_transaksi.php" method="post">
        <input type="hidden" name="tgl" value="<?= isset($_POST['tgl']) ? $_POST['tgl'] : ''; ?>">
        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : ''; ?>">

        <h2>Pilih Barang</h2>
        <table id="table_detail" border="1">
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Tindakan</th>
            </tr>
            <tr>
                <td>
                    <select name="pilih_barang[]" class="pilih_barang" onchange="isiHarga(this)" required>
                        <option value="">Pilih Barang</option>
                        <?php
                            $pilih_barang = mysqli_query($conn, "SELECT id, nama_barang, harga FROM barang");
                                while ($row = mysqli_fetch_assoc($pilih_barang)){
                                    $selected = ($_POST['id'] ?? '') == $row['id'] ? 'selected' :'';
                                        echo "<option value='{$row['id']}' harga='{$row['harga']}'$selected>{$row['nama_barang']}</option>";
                                }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="harga[]" class="harga" readonly>
                </td>
                <td>
                    <input type="number" name="qty[]" class="qty" min="1" onkeyup="hitungSubtotal(this)">
                </td>
                <td>
                    <input type="number" name="subtotal[]" class="subtotal" readonly>
                </td>
                <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
            </tr>
        </table>
        <br>
        <button type="button" onclick="tambahBaris()">Tambah Barang</button>
        <br><br>
        <label for="total_transaksi">Total Transaksi</label>
        <input type="number" name="total_transaksi" id="total_transaksi" readonly>
        <br><br>
        <button type="submit" name="simpan">Simpan Transaksi</button>
    </form>      
    <?php
    }
    ?>

    <script>
    function isiHarga(selectBarang) {
        let harga = selectBarang.options[selectBarang.selectedIndex].getAttribute("harga");
        let row = selectBarang.parentNode.parentNode;
        row.querySelector(".harga").value = harga;
        hitungSubtotal(row.querySelector(".qty"));
    }

    function hitungSubtotal(qtyInput) {
        let row = qtyInput.parentNode.parentNode;
        let qty   = row.querySelector(".qty").value;
        let harga = row.querySelector(".harga").value;
        row.querySelector(".subtotal").value = qty * harga;
        hitungTotal();
    }

    function tambahBaris(){
        let table = document.getElementById("table_detail");
        let barang = table.insertRow(-1);
        barang.innerHTML = `
        <td>
                    <select name="pilih_barang[]" class="pilih_barang" onchange="isiHarga(this)">
                        <option value="">Pilih Barang</option>
                        <?php
                            $pilih_barang = mysqli_query($conn, "SELECT id, nama_barang, harga FROM barang");
                                while ($row = mysqli_fetch_assoc($pilih_barang)){
                                    $selected = ($_POST['nama_barang'] ?? '') == $row['nama_barang'] ? 'selected' :'';
                                        echo "<option value='{$row['id']}' harga='{$row['harga']}'$selected>{$row['nama_barang']}</option>";
                                }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="harga[]" class="harga" readonly></td>
                <td><input type="number" name="qty[]" class="qty" min="1" onkeyup="hitungSubtotal(this)"></td>
                <td><input type="number" name="subtotal[]" class="subtotal" readonly></td>
                <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
        `;
        
    }
    function hapusBaris(btn){
        btn.parentNode.parentNode.remove();
        hitungTotal();
    }
    function hitungTotal(){
        let total = 0;
        document.querySelectorAll(".subtotal").forEach(function(item){
            total += parseInt(item.value) || 0;
        });
        document.getElementById("total_transaksi").value = total;
    }
    </script>
</body>
</html>