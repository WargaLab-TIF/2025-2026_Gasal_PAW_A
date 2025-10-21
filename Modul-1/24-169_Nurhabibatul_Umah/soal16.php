<!-- Fungsi dengan nilai default -->
<?php
function setHeight($minHeight = 50){
    echo "The height is : $minHeight <br>";
}

setHeight(350);
setHeight();
setHeight(135);
setHeight(80);
?>