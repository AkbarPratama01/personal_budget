<?php
session_start();
require_once "../model/Income.php";

$func = $_GET['func'];

if ($func == 'saveIncomeCategory') {
  //get data from POST
  $name_category = $_POST['name_category'];
  $user_id = $_POST['id'];

  //cek wallet
  $income = new Income();
  $status_category = false;

  $cek_category = $income->cekCategory($user_id,$name_category);
  if ($cek_category == 'Data Ada') {
    $status_category = true; // data tidak ada
  } else {
    $status_category = false; // data ada
  }

  if ($status_category == false) {
    // insert data
    if ($income->saveCategory($user_id, $name_category)) {
      echo 'Yes';
    } else {
      echo 'No';
    }
  }
}

if ($func == 'saveIncome') {
  //get data from POST
  $date_income = $_POST['date_income'];
  $name_income = $_POST['name_income'];
  $wallet_select = $_POST['wallet_select'];
  $value_income = $_POST['value_income'];
  $info_income = $_POST['info_income'];
  $user_id = $_POST['id'];

  $arr = array(
    "date_income" => $date_income,
    "name_income" => $name_income,
    "wallet_select" => $wallet_select,
    "value_income" => $value_income,
    "info_income" => $info_income,
    "user_id" => $user_id
  );

  //cek income
  $income = new Income();
  $status_income = false;

  $cek_transaksi = $income->cekTransaksi($user_id, $date_income, $info_income);
  if ($cek_transaksi == 'Data Ada') {
    $status_income = true; // data tidak ada
  } else {
    $status_income = false; // data ada
  }

  if ($status_income == false) {
    // insert data
    if ($income->saveIncome($arr)) {
      echo 'Yes';
    } else {
      echo 'No';
    }
  }
}

if ($func == 'listCategory') {
  //get data from GET
  $user_id = $_GET['id'];
  $income = new Income();
  $daftar = $income->listCategory($user_id);
  echo $daftar;
}

if ($func == 'listMonthIncome') {
  //get data from GET
  $user_id = $_GET['id'];
  $income = new Income();
  $daftar = $income->listMonthIncome($user_id);
  echo $daftar;
}

if ($func == 'incomeTransaction') {
  $id = $_GET['id'];
  $month = isset($_POST['month']) ? $_POST['month'] : 'all';
  $income = new Income();
  $daftar = $income->incomeTransaction($id, $month);
  echo json_encode(['data' => $daftar]);
}