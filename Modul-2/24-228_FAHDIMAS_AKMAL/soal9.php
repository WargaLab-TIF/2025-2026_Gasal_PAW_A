<?php
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
         
        $nama = htmlspecialchars($_POST['nama']);
        $Tugas = (int)$_POST['Tugas'];
        $UTS = (int)$_POST['UTS'];
        $UAS = (int)$_POST['UAS'];
        $hasil = (0.20 * $Tugas) + (0.30 * $UTS) + (0.50 * $UAS);
        $grade = '';
        if ($hasil >= 80) $grade = "A";
        else if ($hasil >= 75) $grade = "B";
        else if ($hasil >= 60) $grade = "C";
        else if ($hasil >= 50) $grade = "D";
        else $grade = "E";

         
        echo '<h2>Hasil Nilai Mahasiswa</h2>';
        
        
        echo '<table border="1" style="width:100%; border-collapse: collapse;">'; 
        
        echo '<tr><td style="padding: 8px;">Nama</td><td style="padding: 8px;">' . $nama . '</td></tr>';
        echo '<tr><td style="padding: 8px;">Nilai Tugas</td><td style="padding: 8px;">' . $Tugas . '</td></tr>';
        echo '<tr><td style="padding: 8px;">Nilai UTS</td><td style="padding: 8px;">' . $UTS . '</td></tr>';
        echo '<tr><td style="padding: 8px;">Nilai UAS</td><td style="padding: 8px;">' . $UAS . '</td></tr>';
        echo '<tr><td style="padding: 8px;">Nilai Akhir (Angka)</td><td style="padding: 8px;">' . number_format($hasil, 2) . '</td></tr>';
        echo '<tr><td style="padding: 8px;">Hasil Akhir (Grade)</td><td style="padding: 8px;">' . $grade . '</td></tr>';
        echo '</table>';
        echo '<br><a href="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">Kembali ke Form</a>';
        echo '</div>';

    } else {
         
    ?>
        <h2>Input Nilai Mahasiswa</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama Mahasiswa</label><br>
            <input type="text" id="nama" name="nama" required><br><br>
            
            <label for="tugas">Nilai Tugas</label><br>
            <input type="number" id="tugas" name="Tugas" min="0" max="100" required><br><br>
            
            <label for="uts">Nilai UTS</label><br>
            <input type="number" id="uts" name="UTS" min="0" max="100" required><br><br>

            <label for="uas">Nilai UAS</label><br>
            <input type="number" id="uas" name="UAS" min="0" max="100" required><br><br>
            
            <input type="submit" value="Hitung Nilai">
        </form>
    <?php
    }
    ?>