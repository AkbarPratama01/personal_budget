<?php
include "../config/db_connection.php";

class Wallet{
  private $conn;

  public function __construct()
  {
    $dbConnection = new DBConnection();
    $this->conn = $dbConnection->connect();
  }

  public function cekWallet($id, $name) {
    // Sanitize input to prevent SQL injection
    $user_id = $this->conn->real_escape_string($id);
    $wallet_name = $this->conn->real_escape_string($name);

    // Prepare SQL statement
    $sql = "SELECT wallet_id FROM `wallet` WHERE user_id = '$user_id' AND name = '$wallet_name'";
    // Execute query
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return 'Data Ada';
    } else {
      return 'Data Tidak Ada';
    }
  }

  public function saveWallet($id, $name, $value) {
    // Create at
    $date = date("Y-m-d H:i:s");

    // Prepare SQL statement
    $sql = "INSERT INTO wallet 
            ( user_id, name, value, create_at) 
            VALUES 
            (?, ?, ?, ?)";
    // Persiapan pernyataan (prepared statement
    $stmt = $this->conn->prepare($sql);

    // Melindungi dari serangan SQL Injection dengan menggunakan bind parameter
    $stmt->bind_param("isis", $id, $name, $value, $date);
    
    // Eksekusi pernyataan
    if ($stmt->execute()) {
      return 'Yes'; // Data berhasil diperbarui
    } else {
      return 'No'; // Gagal memperbarui data
    }
  }

  public function listWallet($id) {
    $html = '<option value="" selected>Pilih Dompet</option>';
    // Prepare SQL statement
    $sql = "SELECT wallet_id, name FROM `wallet` WHERE user_id = '$id'";
    $result = $this->conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $wallet_id = $row['wallet_id'];
      $wallet_name = $row['name'];
      $html .= '<option value="'.$wallet_id.'">'.$wallet_name.'</option>';
    }

    return $html;
  }

  public function getTotalWallet($id) {
    $list = [];
    
    // Prepare SQL statement for total value wallet
    $sql = "SELECT SUM(value) as total_value FROM wallet WHERE user_id = '$id'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $list['total_value'] = $row['total_value'];
    } else {
      $list['total_value'] = 0;
    }
    $result->close();

    // Prepare SQL statement for total pendapatan transaksi
    $sql_incomes = "SELECT COUNT(income_id) AS total_transaksi FROM `incomes` WHERE user_id = '$id'";
    $result_incomes = $this->conn->query($sql_incomes);
    if ($result_incomes->num_rows > 0) {
      $row_incomes = $result_incomes->fetch_assoc();
      $transaksi_incomes = (int)$row_incomes['total_transaksi'];
    } else {
      $transaksi_incomes = 0;
    }
    $result_incomes->close();

    // Prepare SQL statement for total pengeluaran transaksi
    $sql_expenses = "SELECT COUNT(expense_id) AS total_transaksi FROM `expenses` WHERE user_id = '$id'";
    $result_expenses = $this->conn->query($sql_expenses);
    if ($result_expenses->num_rows > 0) {
      $row_expenses = $result_expenses->fetch_assoc();
      $transaksi_expenses = (int)$row_expenses['total_transaksi'];
    } else {
      $transaksi_expenses = 0;
    }
    $result_expenses->close();

    //get data transaksi
    $sql_transactions =  "";
    $list['data_transaksi'];
    $no = 0;
    $result_transactions = $this->conn->query($sql_transactions);
    while ($row_transactions = $result_transactions->fetch_assoc()) {
      $no++;
    }

    $list['total_transaksi'] = $transaksi_incomes + $transaksi_expenses;
    return $list;
    
  }

  private function close()
  {
      $this->conn->close();
  }
}

?>