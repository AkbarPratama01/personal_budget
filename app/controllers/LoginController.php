<?php
session_start();
require_once "../model/Login.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Instantiate User class
  $user = new login();

  // Perform login
  if ($user->getLogin($username, $password)) {
      echo "success";
  } else {
      echo "error";
  }
}

?>