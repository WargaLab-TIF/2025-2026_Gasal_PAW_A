//embedded script adalah kode php yang ada di dalam html <br>
//non-embedded script dalah kode php dari awal hingga akhir <br> <br>

//contoh embedded script <br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo "hai";?></h1>
    <h1><?="hai";?></h1> 
</body>
</html>

#non-embeddedcontoh non-embedded script <br>
<?php
echo "hello";
?> <br>

#variabel <br>
<?php 
$nama = 'firda' ;
echo $nama ;
?> <br>


<?php
//variabel lokal-global 
$y = "variabel luar" ;

function sapa(){
    global $y ;
    echo $y ;
}

sapa();
?> <br>


<?php
//string
//len
$nama = "fauzi" ;
echo strlen($nama); <br>

//replace
$sapaan = "hai dunia";
echo str_replace("hello", "dunia", $sapaan) ; <br>

//word count
echo str_word_count($sapaan) ;
 
