<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TP5";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "
-- Data Supplier
INSERT INTO supplier (nama, telp, alamat) VALUES
// ('PT. Sinar Jaya Abadi', '021-555-1001', 'Kawasan Industri Pulogadung, Jakarta'),
// ('CV. Sumber Rejeki', '031-666-2002', 'Kawasan Industri Rungkut, Surabaya'),
// ('UD. Makmur Sentosa', '022-777-3003', 'Jl. Cibaduyut No. 15, Bandung'),
// ('PT. Tani Sejahtera', '0274-888-4004', 'Jl. Kaliurang Km 10, Yogyakarta'),
// ('CV. Global Elektronik', '0341-999-5005', 'Jl. Letjen S. Parman, Malang'),
// ('PT. Indofood Sukses Makmur', '021-444-6006', 'Sudirman Plaza, Jakarta'),
// ('CV. Cahaya Kimia', '024-333-7007', 'Kawasan Industri Candi, Semarang'),
// ('PT. Maju Logistik', '061-222-8008', 'Jl. Pelabuhan Raya, Medan'),
// ('UD. Bali Jaya Komputer', '0361-111-9009', 'Jl. Teuku Umar, Denpasar'),
('PT. Prima Tekstil', '0411-000-1010', 'KIMA, Makassar');
";


if (mysqli_multi_query($conn, $sql)) {
    echo "Semua 10+ data berhasil dimasukkan ke setiap tabel!";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>