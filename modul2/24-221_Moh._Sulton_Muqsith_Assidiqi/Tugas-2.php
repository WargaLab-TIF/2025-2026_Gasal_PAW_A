<!-- 1. if statement -->
 <?php 
$t = date("H");

if ($t < "20") {
    echo "Have a good day! <br>";
}
?>

<!-- 2. if else statement -->
<?php 
$t = date("H");

if ($t < "20") {
    echo "Have a good day! <br>";
} else {
    echo "Have a good night!<br>";
}
?>

<!-- 3. if else statement -->
<?php
$t = date("H");

if ($t < "10") {
    echo "Have a good morning!<br>";
} elseif ($t < "20") {
    echo "Have a good day!<br>";
} else {
    echo "Have a good night!<br>";
}
?>

<!-- 4. switch statement -->
<?php 
$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "your favorite color is red! <br>";
        break;
    case "blue":
        echo "your favorite color is blue! <br>";
        break;
    case "green":
        echo "your favorite color is green! <br>";
        break;
    default:
        echo "your favorite color is neither red, blue, nor greeen! <br>";
}
?>

<!-- 5. while -->
<?php
$x = 1;

while($x <= 5) {
    echo "The number is: $x <br>";
$x++;
}
?>

<!-- 6. do..while -->
<?php
$x = 1;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);
?>

<!-- 7. for -->
<?php
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}
?>
<!-- 8. foreach -->
<?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
    echo "$value <br>";
}
?>

echo "Your favorite color is neither red, blue, nor green!";

14. default:
12. echo "Your favorite color is green!";

<?php
for ($x = 0; $x <= 10; $x++) {
echo "The number is: $x <br>";
echo "$value <br>";
}
?>

<!-- 9. Percabanagan mahasiswa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>
<body>
    <form method="post">
        <label for="nilai">Nilai</label>
        <input type="number" name="nilai" id="nilai" required>
        <button type="submit">Submit</button>
    </form>
    <?php 
    if (isset($_POST['nilai'])){
        $nilai = $_POST['nilai'];
        if ($nilai >= 85 && $nilai <= 100){
            echo "A";
        }
        else if ($nilai >= 70 && $nilai <= 85){
            echo "B";
        }
        else if ($nilai >= 55 && $nilai <= 70){
            echo "C";
        }
        else if ($nilai >= 40 && $nilai <= 55){
            echo "D";
        }
        else {
            echo "E";
        }
    }
    ?>
</body>
</html>

<!-- 10. Kasir -->
<?php
session_start();

// kalau belum ada pesanan, buat array kosong
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

// jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    // daftar harga menu
    $daftar_menu = [
        "Nasi Goreng" => 15000,
        "Nasi Ayam Penyet" => 25000,
        "Nasi Tempe Penyet" => 10000,
        "Ayam Bakar" => 20000,
        "Es Teh"     => 5000,
        "Jus Jeruk"  => 8000,
        "Air Mineral"  => 5000
    ];

    $harga = $daftar_menu[$menu];
    $subtotal = $harga * $jumlah;

    // simpan pesanan ke session
    $_SESSION['pesanan'][] = [
        "menu" => $menu,
        "jumlah" => $jumlah,
        "subtotal" => $subtotal
    ];
}

// jika tombol selesai ditekan
if (isset($_POST['selesai'])) {
    $total = 0;
    foreach ($_SESSION['pesanan'] as $p) {
        $total += $p['subtotal'];
    }
    echo "<h2>Struk Belanja</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>";
    foreach ($_SESSION['pesanan'] as $p) {
        echo "<tr>
                <td>{$p['menu']}</td>
                <td>{$p['jumlah']}</td>
                <td>Rp " . number_format($p['subtotal'], 0, ',', '.') . "</td>
              </tr>";
    }
    echo "<tr>
            <td colspan='2'><b>Total</b></td>
            <td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td>
          </tr>";
    echo "</table>";
    echo "<p>Terima kasih sudah berbelanja!</p>";

    // reset pesanan
    unset($_SESSION['pesanan']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Menu Kasir</h2>
    <form method="post">
        <label for="menu">Pilih Menu:</label>
        <select name="menu" id="menu" required>
            <option value="Nasi Goreng">Nasi Goreng - Rp15.000</option>
            <option value="Nasi Ayam Penyet">Nasi Ayam Penyet - Rp25.000</option>
            <option value="Nasi Tempe Penyet">Nasi Tempe Penyet - Rp10.000</option>
            <option value="Ayam Bakar">Ayam Bakar - Rp20.000</option>
            <option value="Es Teh">Es Teh - Rp5.000</option>
            <option value="Jus Jeruk">Jus Jeruk - Rp8.000</option>
            <option value="Air Mineral">Air Mineral - Rp5.000</option>
        </select><br><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" value="1" min="1" required><br><br>

        <button type="submit" name="tambah">Tambah Pesanan</button>
        <button type="submit" name="selesai">Selesai</button>
    </form>

    <?php
    // tampilkan daftar pesanan sementara
    if (!empty($_SESSION['pesanan'])) {
        echo "<h3>Pesanan Sementara:</h3>";
        echo "<ul>";
        foreach ($_SESSION['pesanan'] as $p) {
            echo "<li>{$p['menu']} x {$p['jumlah']} = Rp " . number_format($p['subtotal'], 0, ',', '.') . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>

