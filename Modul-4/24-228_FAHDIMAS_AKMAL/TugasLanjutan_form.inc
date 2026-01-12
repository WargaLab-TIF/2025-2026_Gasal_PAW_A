<style>
div { margin-bottom: 15px; }
label { display: block; font-weight: bold; }
input[type="text"], input[type="password"] { width: 300px; padding: 5px; }
</style>
<form action="TugasLanjutan_Mahasiswa.php" method="POST">
<h1>Form Input Data Mahasiswa</h1>
<div>
<label for="nama_depan">Nama Depan:</label>
<input type="text" id="nama_depan" name="nama_depan" value="<?php showValue('nama_depan'); ?>">
<?php showError($errors, 'nama_depan'); ?>
</div>
<div>
<label for="email">Email:</label>
<input type="text" id="email" name="email" value="<?php showValue('email'); ?>">
<?php showError($errors, 'email'); ?>
</div>
<div>
<label for="password">Password:</label>
<input type="password" id="password" name="password" value="">
<?php showError($errors, 'password'); ?>
</div>
<br>
<input type="submit" name="submit_form" value="Daftar">
</form>