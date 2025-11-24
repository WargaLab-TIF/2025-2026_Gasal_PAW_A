<?php

require_once "../conn.php";
require_once "../utils.php";

isNotAuth();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = trim(htmlspecialchars($_POST["username"]));
  $name = trim(htmlspecialchars($_POST["name"]));
  $telp = trim(htmlspecialchars($_POST["telp"]));
  $address = trim(htmlspecialchars($_POST["address"]));

  var_dump($address);

  $_SESSION["err_msg"] = [];  

  validateUsername($username);

  if ($_SESSION["err_msg"]) {
    header("Location: /pages/update_profile.php");
    exit();
  } else {
    $sqlUpdateuser = "
      UPDATE user
      SET username = '$username', nama = '$name', alamat = '$address', hp = '$telp'
      WHERE username = '$username';
    ";

    var_dump(mysqli_query($conn, $sqlUpdateuser));

    $_SESSION["err_msg"] = [];

    if (mysqli_query($conn, $sqlUpdateuser)) {
      $user = getUser($conn, $username);
      $_SESSION["user"] = [
        "login" => true,
        "name" => $user["nama"],
        "username" => $user["username"],
        "level" => (int) $user["level"]
      ];
      header("Location: /pages/index.php");
      exit();
    } else {
      header("Location: /pages/update_profile.php?failed=Gagal registrasi");
      exit();
    }
  }
}