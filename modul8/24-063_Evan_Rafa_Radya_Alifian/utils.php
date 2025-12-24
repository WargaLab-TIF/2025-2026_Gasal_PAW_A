<?php

function validateUsername($username) {
  if (!$username) {
    $_SESSION["err_msg"][] = "Username tidak boleh kosong";
  }

  if (strlen($username) < 5) {
    $_SESSION["err_msg"][] = "Username minimal 5 karakter";
  }
}

function validatePassword($password) {
  if (!$password) {
    $_SESSION["err_msg"][] = "Password tidak boleh kosong";
  }

  if (strlen($password) < 8) {
    $_SESSION["err_msg"][] = "Password minimal 8 karakter";
  }
}

function isAuth() {
  session_start();
  if (isset($_SESSION["user"]) && $_SESSION["user"]["login"] === true) {
    header("Location: /pages/index.php");
    exit;
  }
}

function isNotAuth() {
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: /pages/signin.php");
    exit;
  }
}

function isUsernameExist($username) {
  global $conn;

  $sqlGetUsername = "
    SELECT username FROM user WHERE username = '$username';
  ";
  
  mysqli_query($conn, $sqlGetUsername);

  if (mysqli_affected_rows($conn)) {
    $_SESSION["err_msg"][] = "Username sudah tersedia";
  }
}

function validateAuth($user, $password) {
  $hash_password = $user["password"];

  if ($user) {
    if ($password != $hash_password) {
      $_SESSION["err_msg"][] = "Password salah";
    }
  } else {
    $_SESSION["err_msg"][] = "Username tidak ditemukan";
  }
}

function getUser($conn, $username) {
  $sqlGetUser = "SELECT * FROM user WHERE username = '$username'";
  $userRes = mysqli_query($conn, $sqlGetUser);
  return mysqli_fetch_assoc($userRes);
}