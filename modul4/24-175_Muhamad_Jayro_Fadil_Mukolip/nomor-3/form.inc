<?php
$back_surn = isset($_POST['surname']) ? $_POST['surname'] : '';
$back_email = isset($_POST['email']) ? $_POST['email'] : '';
echo "<div>
        <fieldset>
            <legend>prosess Data</legend>
            <form action='#' method='post'>
                <div>
                    <label for='surname'>
                        nama mahasiswa : <br>
                        <input type='text' name='surname' id='surname' value='$back_surn'>
                    </label>
                </div>
                <div>
                    <label for='email'>
                        email: <br>
                        <input type='text' name='email' id='email' value='$back_email'>
                    </label>
                </div>
                <div>
                    <label for='jurusan'>
                        jurusan: <br>
                        <select name='jurusan' id='jurusan'>
                            <option value='teknik_informatika'>Teknik Informatika</option>
                            <option value='sistem_informasi'>Sistem Informasi</option>
                            <option value='teknik_elektro'>Teknik Elektro</option>
                            <option value='teknik_mesin'>Teknik Mesin</option>
                        </select>
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

