<?php
echo "<div>
        <fieldset>
            <legend>prosess Data</legend>
            <form action='processData_form.php' method='post'>
                <div>
                    <label for='surname'>
                        surname : <br>
                        <input type='text' name='surname' id='surname'>
                    </label>
                </div>
                <div>
                    <label for='email'>
                        email address: <br>
                        <input type='text' name='email' id='email'>
                    </label>
                </div>
                <div>
                    <label for='password'>
                        password : <br>
                        <input type='password' name='password' id='password'>
                    </label>
                </div><br>
                <div>
                    <button type='reset'>reset</button>
                    <button type='submit'>kirim</button>
                </div>
            </form>
        </fieldset>
    </div>";
?>

