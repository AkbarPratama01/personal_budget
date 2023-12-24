<?php
session_start();
require_once "../model/Wallet.php";

$func = $_GET['func'];

//simpan wallet
if ($func == 'saveWallet') {
  //get data from POST
  $name_wallet = $_POST['name_wallet'];
  $value_wallet = $_POST['value_wallet'];
  $user_id = $_POST['id'];

  //cek wallet
  $wallet = new Wallet();
  $status_wallet = false;

  $cek_wallet = $wallet->cekWallet($user_id,$name_wallet);
  if ($cek_wallet == 'Data Ada') {
    $status_wallet = true; // data tidak ada
  } else {
    $status_wallet = false; // data ada
  }

  if ($status_wallet == false) {
    // insert data
    if ($wallet->saveWallet($user_id, $name_wallet, $value_wallet)) {
      echo 'Yes';
    } else {
      echo 'No';
    }
  }
  
}

//get wallet
if ($func == 'getWallet') {
  $user_id = $_GET['id'];
  $wallet = new Wallet();
  $list_wallet = $wallet->listWallet($user_id);
  echo $list_wallet;
}

if ($func == 'getTotalWallet') {
  $user_id = $_GET['id'];
  $wallet = new Wallet();
  $result = $wallet->getTotalWallet($user_id);
  echo json_encode($result);
}