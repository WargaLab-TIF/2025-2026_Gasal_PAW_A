<!-- PHP case sensitif -->
<!DOCTYPE html>
<html>
<body>
    <?php
    $color = "red";
    echo "My car is " . $color . "<br>";
    echo "My house is " . $COLOR . "<br>"; // $COLOR berbeda dengan $color
    echo "My boat is " . $coLOR . "<br>";  // variabel ini juga berbeda
    ?>
</body>
</html>