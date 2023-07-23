<?php
session_start();
require_once "../model/Dashboard.php";

$func = $_GET['func'];

if ($func == 'getDashboard') {
  $id = $_POST['id'];
  $data = [];

  
}