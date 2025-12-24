<?php

require_once "../utils.php";

isNotAuth();

session_start();
session_destroy();
session_unset();
header("Location: /pages/signin.php");
exit;