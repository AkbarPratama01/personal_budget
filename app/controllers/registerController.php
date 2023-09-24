<?php
session_start();
require_once "../model/Register.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate User class
    $user = new register();

    // Perform login
    $result = $user->getRegister($fullname, $username, $password);
    echo $result;
}