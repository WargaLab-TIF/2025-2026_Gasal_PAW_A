<!-- fungsi dengan nilai default pada argumen -->
<?php
function setHeight($minheight = 50) {
    echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight();      // akan memakai nilai default 50
setHeight(135);
setHeight(80);
?>