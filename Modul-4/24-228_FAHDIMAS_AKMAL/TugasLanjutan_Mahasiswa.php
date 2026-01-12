<?php
require 'TugasLanjutan_validate.inc';
$errors = array();
if (isset($_POST['submit_form']))
{
validateName($errors, $_POST, 'nama_depan');
validateEmail($errors, $_POST, 'email');
validatePassword($errors, $_POST, 'password');
if ($errors)
{
include 'TugasLanjutan_form.inc';
}
else
{
echo '<h1>Registrasi Berhasil!</h1>';
echo '<p>Selamat datang, ' . htmlspecialchars($_POST['nama_depan']) . '!</p>';
}
}
else
{
include 'TugasLanjutan_form.inc';
}
?>