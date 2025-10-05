<!-- fungsi dengan nilai default pada argumen -->
<?php
    function setHeight($minheight = 50) {
        echo "The height is : $minheight <br>";
    }

    setHeight(350);
    setHeight(); // will use d default value of 50
    setHeight(35);
    setHeight(80);
?>