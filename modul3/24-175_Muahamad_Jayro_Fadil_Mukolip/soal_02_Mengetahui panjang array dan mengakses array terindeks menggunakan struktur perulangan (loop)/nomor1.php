<?php
function tampilkan($array){
    $tampil = '';
    for ($i=0; $i < count($array); $i++) { 
        $tampil .= '<br>' . "<b>$array[$i]</b>" . ' index ke - ' . $i;
    }
    echo $tampil;
}




$buah = array('pisang','apukad','jambu');
$buah_baru = ['mangga','apel','jeruk','anggur','semangka'];


echo '<br><h1>Array lama</h1>';
tampilkan($buah);

$len = count($buah_baru);
for ($i=0; $i < $len; $i++) { 
    $buah[] = $buah_baru[$i];
}
echo '<br> <h1>Array baru</h1>';
tampilkan($buah);