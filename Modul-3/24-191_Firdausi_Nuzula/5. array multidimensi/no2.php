<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
</head>
<body>

<h2>Tabel Data Mahasiswa</h2>

<?php
$students = array(
  array("Alex", "220401", "0812345678"),
  array("Bianca", "220402", "0812345687"),
  array("Candice", "220403", "0812345665")
);
?>

<table border="1" cellpadding="5">
  <tr>
    <th>Name</th>
    <th>NIM</th>
    <th>Mobile</th>
  </tr>

  <?php
  foreach ($students as $murid) {
    echo "<tr>";
      echo "<td>" . $murid[0] . "</td>"; 
      echo "<td>" . $murid[1] . "</td>"; 
      echo "<td>" . $murid[2] . "</td>"; 
    echo "</tr>";
  }
  ?>
</table>

</body>
</html>