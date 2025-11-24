<?php

require_once "../conn.php";
require_once "../utils.php";

isAuth();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = strtolower(trim(htmlspecialchars($_POST["username"])));
  $password = md5(trim(htmlspecialchars($_POST["password"])));

  $_SESSION["err_msg"] = [];

  $user = getUser($conn, $username);
  
  validateAuth($user, $password);

  if ($_SESSION["err_msg"]) {
    header("Location: ../pages/signin.php");
    exit;
  } else {
    $_SESSION["err_msg"] = [];

    $_SESSION["user"] = [
      "login" => true,  
      "name" => $user["nama"],
      "username" => $user["username"],
      "level" => (int) $user["level"]
    ];

    header("Location: ../pages/index.php");
    exit;
  }
}