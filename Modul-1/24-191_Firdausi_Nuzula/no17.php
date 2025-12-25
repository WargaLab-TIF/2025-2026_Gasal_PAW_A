<?php
function setHeight($minheight = 50) {
    echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight();    // akan menggunakan nilai default 50
setHeight(135);
setHeight(80);
?>
