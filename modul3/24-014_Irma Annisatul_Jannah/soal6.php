<?php
 //3.6.1 array_push() nambah data ke belakang array
echo"<h3>3.6.1 array_push()</h3>";
$Lfruits=["Mangga"];
array_push($Lfruits,"Cherry","Jambu");
echo"Hasil array_push:";
var_dump($Lfruits);
echo"<br><br>";

//3.6.2array_merge() menggabung dua array jadi satu
echo"<h3>3.6.2array_merge()</h3>";
$a1=["Lintang","Aji"];
$a2=["Faris"];
$merged=array_merge($a1,$a2);
echo"Hasilarray_merge:";
var_dump($merged);
echo"<br><br>";

//3.6.3 array_values() reset nilai menjadi angka
echo"<h3>3.6.3array_values()</h3>";
$av=["Evo"=>176,"Jody"=>165, "Esa"=>170];
$values=array_values($av);
echo"Hasilarray_values(reset indeks numerik): ";
var_dump($values);
echo"<br><br>";

//3.6.4array_search() mencari nilai
echo"<h3>3.6.4array_search()</h3>";
$indexM=array_search("Mangga", $Lfruits);
echo"Index 'Mangga' pada \$fruits: " .var_export($indexM,
true)."<br>";
$key1=array_search(165,$av);
echo"Key untuk nilai 165 pada \$av: " . var_export($key1, true) .
"<br><br>";

//3.6.5array_filter() Menyaring data sesuai kondisi
echo"<h3>3.6.5array_filter()</h3>";
$numbers=[1,2,3,4,5,6,7,8,9,10];
$n2=array_filter($numbers,function($n){ return $n % 2 === 0; });
echo"Bilangan genap hasil array_filter: ";
var_dump(array_values($n2));
echo"<br><br>";

//3.6.6 Berbagai fungsi sorting
echo"<h3>3.6.6 Fungsi Sorting</h3>";
$toSort=["Pink","Apple","Jambu", "Leci"];
$nums=[3,1,4,2];
$assocSort=["d"=>4,"a"=>1, "c"=>3, "b"=>2];
$tmp=$toSort;sort($tmp);echo "sort (nilai naik): "; var_dump($tmp);
echo"<br>";
$tmp=$toSort;rsort($tmp);echo "rsort (nilai turun): ";
var_dump($tmp);echo"<br>";
$tmp=$assocSort;asort($tmp); echo "asort (asos. nilai naik, jaga
key):";var_dump($tmp);echo "<br>";
$tmp=$assocSort;arsort($tmp); echo "arsort (asos. nilai turun, jaga
key):";var_dump($tmp);echo "<br>";
$tmp=$assocSort;ksort($tmp); echo "ksort (urut key naik): ";
var_dump($tmp);echo"<br>";
$tmp=$assocSort;krsort($tmp); echo "krsort (urut key turun): ";
var_dump($tmp);echo"<br>";
?>