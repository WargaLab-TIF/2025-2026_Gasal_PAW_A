<?php
$back_surn = isset($_POST['surname']) ? $_POST['surname'] : '';
$back_email = isset($_POST['email']) ? $_POST['email'] : '';
echo "<div>
        <fieldset>
            <legend>prosess Data</legend>
            <form action='#' method='post'>
                <div>
                    <label for='surname'>
                        surname : <br>
                        <input type='text' name='surname' id='surname' value='$back_surn'>
                    </label>
                </div>
                <div>
                    <label for='email'>
                        email address: <br>
                        <input type='text' name='email' id='email' value'$back_email'>
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

