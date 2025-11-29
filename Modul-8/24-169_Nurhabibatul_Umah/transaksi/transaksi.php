<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../../login/login.php");
    exit;
}
require '../config.php';
$level = $_SESSION['level'] ?? 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: 0.3s;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .form-section {
            margin-top: 60px;
        }
        .container{
            margin-top: 50px;
        }
    </style>
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand" href="../index.php">Sistem Penjualan</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU -->
            <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="../index.php">Home</a>
                </li>
                <?php if ($level == 1): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button"
                        data-bs-toggle="dropdown">
                        Data Master
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../master/barang/">Data Barang</a></li>
                        <li><a class="dropdown-item" href="../master/supplier/">Data Supplier</a></li>
                        <li><a class="dropdown-item" href="../master/pelanggan/">Data Pelanggan</a></li>
                        <li><a class="dropdown-item" href="../master/user/">Data User</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Transaksi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="../laporan/index.php">Laporan</a>
                </li>
            </ul>

            <!-- USER LOGIN + LOGOUT -->
            <span class="navbar-text text-white me-3">
                <?= $_SESSION['username']; ?>
            </span>
            <a href="../logout.php" class="btn btn-light btn-sm">Logout</a>

        </div>
    </div>
</nav>
<!-- END NAVBAR -->

<div class="container">
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
        <label for="keterangan">Keterangan Pembelian</label>
        <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan Pembelian" required>
        <br><br>
        <input type="submit" name="pilih" value="Kirim">
    </form>

    <?php
    if (isset($_POST['pilih'])){
    ?>

    <form action="simpan_transaksi.php" method="post">
        <input type="hidden" name="tgl" value="<?= isset($_POST['tgl']) ? $_POST['tgl'] : ''; ?>">
        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : ''; ?>">
        <input type="hidden" name="keterangan" value="<?= isset($_POST['keterangan']) ? htmlspecialchars($_POST['keterangan']) : ''; ?>">
        <br>
        <h2>Pilih Barang</h2>
        <table id="table_detail" border="1">
            <tr>
                <th>Barang</th>
                <th>Stok</th>
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
                            $pilih_barang = mysqli_query($conn, "SELECT id, nama_barang, harga, stok FROM barang");
                            while ($row = mysqli_fetch_assoc($pilih_barang)){
                                echo "<option value='{$row['id']}' harga='{$row['harga']}' stok='{$row['stok']}'> {$row['nama_barang']}
                                      </option>";
                            }
                        ?>
                    </select>
                </td>
                <td>
                    <span class="stok_tersisa"></span>
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
        let stok = selectBarang.options[selectBarang.selectedIndex].getAttribute("stok");
        let row = selectBarang.parentNode.parentNode;
        row.querySelector(".harga").value = harga;
        row.querySelector(".stok_tersisa").textContent = stok; 
        hitungSubtotal(row.querySelector(".qty"));
    }

    function hitungSubtotal(qtyInput) {
        let row = qtyInput.parentNode.parentNode;
        let qty   = row.querySelector(".qty").value;
        let harga = row.querySelector(".harga").value;
        let stok = parseInt(row.querySelector(".stok_tersisa").textContent);

        if(qty > stok) {
            alert("Jumlah melebihi stok tersisa!");
            qtyInput.value = stok;
            qty = stok;
        }

        row.querySelector(".subtotal").value = qty * harga;
        hitungTotal();
    }

    function tambahBaris(){
        let table = document.getElementById("table_detail");
        let barang = table.insertRow(-1);
        barang.innerHTML = `
                <td>
                    <select name="pilih_barang[]" class="pilih_barang" onchange="isiHarga(this)" required>
                        <option value="">Pilih Barang</option>
                        <?php
                            $pilih_barang = mysqli_query($conn, "SELECT id, nama_barang, harga, stok FROM barang");
                            while ($row = mysqli_fetch_assoc($pilih_barang)){
                                echo "<option value='{$row['id']}' harga='{$row['harga']}' stok='{$row['stok']}'> {$row['nama_barang']}
                                      </option>";
                            }
                        ?>
                    </select>
                </td>
                <td><span class="stok_tersisa"></span></td>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>