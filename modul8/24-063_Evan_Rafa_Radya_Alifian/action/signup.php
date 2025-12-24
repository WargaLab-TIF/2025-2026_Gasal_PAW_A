<?php

require_once "../conn.php";
require_once "../utils.php";

isAuth();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = strtolower(trim(htmlspecialchars($_POST["username"])));
  $password = trim(htmlspecialchars($_POST["password"]));
  $name = trim(htmlspecialchars($_POST["name"]));
  $telp = trim(htmlspecialchars($_POST["telp"]));
  $address = trim(htmlspecialchars($_POST["address"]));

  $_SESSION["err_msg"] = [];

  validateUsername($username);
  validatePassword($password);
  isUsernameExist($username);

  $password_hash = md5($password);

  if ($_SESSION["err_msg"]) {
    header("Location: ../pages/signup.php");
    exit();
  } else {
    $sqlInserUser = "
      INSERT INTO user (username, password, nama, alamat, hp, level)
      VALUES ('$username', '$password_hash', '$name', '$address', '$telp', 2);
    ";

    $_SESSION["err_msg"] = [];

    if (mysqli_query($conn, $sqlInserUser)) {
      header("Location: ../pages/signin.php");
      exit();
    } else {
      header("Location: ../pages/signup.php?failed=Gagal registrasi");
      exit();
    }
  }
}