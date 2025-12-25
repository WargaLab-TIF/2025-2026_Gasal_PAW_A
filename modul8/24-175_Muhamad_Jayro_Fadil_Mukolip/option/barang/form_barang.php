<?php 
include '../conn.php';

$query = "SELECT * FROM supplier";
$ex = mysqli_query($conn, $query);
$result = mysqli_fetch_all($ex, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Barang</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 2rem 0;
    }
    .form-container {
      background-color: #ffffff;
      padding: 2.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      width: 100%;
      max-width: 500px;
    }
    .form-container h3 {
      color: #0d6efd;
      text-align: center;
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h3>Tambah Data Barang</h3>
    
    <form method="post" action="process_data.php">
      
      <div class="mb-3">
        <label for="kode" class="form-label">Kode Barang</label>
        <input type="text" class="form-control" id="kode" name="kode" placeholder="BRG000" required>
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="barang saya" required>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga Barang</label>
        <input type="number" class="form-control" id="harga" name="harga" placeholder="10000" required>
      </div>

      <div class="mb-3">
        <label for="stok" class="form-label">Stok Barang</label>
        <input type="number" class="form-control" id="stok" name="stok" placeholder="100" required>
      </div>
      
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <select class="form-select" name="supplier" id="supplier" required>
          <option value="">-- Pilih Supplier --</option>
          <?php foreach($result as $v){ ?>
            <option value="<?= $v['id']; ?>"><?= $v['nama']; ?></option>
          <?php } ?>
        </select>
      </div>
      
      <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
        <a href="barang.php" class="btn btn-danger">Batal</a>
      </div>

    </form>
  </div>

</body>
</html>