<?php 
function setHeight($minheight = 50) {
    echo "The heigt is ; $minheight <br>";
}

setHeight(350);
setHeight(); //will use default value of 50
setHeight(135);
setHeight(80);
?>