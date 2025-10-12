<?php
 //Skrip dasar: array 2D berisi [Name, NIM, Mobile]
 $students = array(
 array("Alex", "240455", "0895875430"),
 array("Bianca", "220487", "0895675490"),
array("Candice","240490", "0895342679")
 );
for($row=0;$row<count($students); $row++) {
echo"<p><b>Rownumber $row</b></p>";
echo"<ul>";
for($col=0;$col< 3; $col++) {
echo"<li>".$students[$row][$col]."</li>";
 }
 echo"</ul>";
 }
 //3.5.1 Tambahkan 5 databaru
 $LStudents=array(
 array("Agiz", "250419", "0895249080"),
 array("Andry", "240490", "0895987687"),
 array("Farhan", "220476", "0895381987"),
 array("Victor", "230465", "0895896534"),
 array("Amy", "210457", "0895238765")
 );
 $students=array_merge($students, $LStudents);
 echo"<h3>DataStudentssetelah penambahan 5 data baru</h3>";
 for($row=0;$row<count($students); $row++) {
 echo"<p><b>Rownumber $row</b></p>";
 echo"<ul>";
 for($col=0;$col< 3; $col++) {
 echo"<li>".$students[$row][$col]."</li>";
 }
 echo"</ul>";
 }
 echo"<br>";
//3.5.2 Tampilkan data dalam bentuk tabel
echo "<h3>Data Students (Tabel)</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

foreach($students as $s){
    echo "<tr>";
    echo "<td>" . $s[0] . "</td>";
    echo "<td>" . $s[1] . "</td>";
    echo "<td>" . $s[2] . "</td>";
    echo "</tr>";
}

echo "</table>";
