    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <h3>Grade Nilai</h3>

    <form action="" method="post">
    Nilai : <input type="number" name="nilai">
    <br><br>
    <input type="submit">
    <br><br>
    </form>

    <?php 
    if (isset($_POST['nilai'])){
        $nilai = $_POST['nilai'];

        if($nilai > 100){
            echo "nilai tidak boleh lebih dari <b>100</b>";
        }elseif ($nilai >= 80){
            echo "good job, u got <b>A</b>";
        } elseif ($nilai >= 70){
            echo "good job, u got <b>B</b>";
        } elseif ($nilai >= 60){
            echo "good job, u got <b>C</b>";
        } elseif ($nilai >= 50){
            echo "good job, u got <b>D</b>";
        } else{
            echo "kita mulai lagi ya" ;
        }
    }
    ?>
    </body>
    </html>