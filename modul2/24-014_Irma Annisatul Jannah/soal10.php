<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kasir Sederhana</title>
</head>
<body>

  <h2>Kasir Warung</h2>

  <form method="post">
    <label>Pilih Menu:</label><br>
    1. Nasi Goreng - Rp15000<br>
    2. Mie Ayam - Rp12000<br>
    3. Es Teh - Rp5000<br>
    4. Es Jeruk - Rp7000<br><br>

    Nomor menu: <input type="number" name="menu"><br><br>
    Jumlah porsi: <input type="number" name="jumlah"><br><br>
    <input type="submit" name="hitung" value="Tambahkan">
  </form>

  

  <?php
  // Simpan total sementara dalam session
  session_start();
  if (!isset($_SESSION['total'])) {
      $_SESSION['total'] = 0;
  }

  if (isset($_POST['hitung'])) {
      $pilihan = $_POST['menu'];
      $jumlah = $_POST['jumlah'];
      $nama = "";
      $harga = 0;

      // Percabangan tanpa array
      if ($pilihan == 1) {
          $nama = "Nasi Goreng";
          $harga = 15000;
      } elseif ($pilihan == 2) {
          $nama = "Mie Ayam";
          $harga = 12000;
      } elseif ($pilihan == 3) {
          $nama = "Es Teh";
          $harga = 5000;
      } elseif ($pilihan == 4) {
          $nama = "Es Jeruk";
          $harga = 7000;
      } else {
          echo "Pilihan menu tidak valid!<br>";
      }

      if ($harga > 0) {
          $subtotal = $harga * $jumlah;
          $_SESSION['total'] += $subtotal;
          echo "Pesanan: $nama ($jumlah porsi) = Rp $subtotal<br>";
      }
  }

  if (isset($_POST['selesai'])) {
      echo "<h3>Total yang harus dibayar: Rp " . $_SESSION['total'] . "</h3>";
      session_destroy();
  }
  ?>

  <form method="post">
    <input type="submit" name="selesai" value="Selesai & Lihat Total">
  </form>

</body>
</html>
