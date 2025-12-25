<?php

$sayur = array('sawi', 'brokoli', 'wortel');

$tampil = '';
for ($i = 0; $i < count($sayur); $i++) {
    $tampil .= '<br>' . "<b>$sayur[$i]</b>" . ' index ke - ' . $i;
}
echo "<h1>Array sayuran</h1>$tampil";