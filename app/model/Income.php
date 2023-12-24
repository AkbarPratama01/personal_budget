<?php
include "../config/db_connection.php";

class Income{
  private $conn;

  public function __construct()
  {
    $dbConnection = new DBConnection();
    $this->conn = $dbConnection->connect();
  }

  public function cekCategory($id, $name) {
    // Sanitize input to prevent SQL injection
    $user_id = $this->conn->real_escape_string($id);
    $category_name = $this->conn->real_escape_string($name);

    // Prepare SQL statement
    $sql = "SELECT category_id FROM `incomes_category` WHERE user_id = '$user_id' AND name = '$category_name'";
    // Execute query
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return 'Data Ada';
    } else {
      return 'Data Tidak Ada';
    }
    $result->close();
  }

  public function cekTransaksi($id, $date, $ket) {
    // Sanitize input to prevent SQL injection
    $user_id = $this->conn->real_escape_string($id);
    $tanggal = $this->conn->real_escape_string($date);
    $info = $this->conn->real_escape_string($ket);

    $sql = "SELECT * FROM incomes WHERE user_id = '$user_id' AND date = '$tanggal' AND description = '$info'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return 'Data Ada';
    } else {
      return 'Data Tidak Ada';
    }
    $result->close();
  }

  public function saveCategory($id, $name) {
    $date = date("Y-m-d H:i:s");

    // Prepare SQL statement
    $sql = "INSERT INTO incomes_category 
            ( user_id, name, created_at) 
            VALUES 
            (?, ?, ?)";
    // Persiapan pernyataan (prepared statement
    $stmt = $this->conn->prepare($sql);

    // Melindungi dari serangan SQL Injection dengan menggunakan bind parameter
    $stmt->bind_param("iss", $id, $name, $date);
    
    // Eksekusi pernyataan
    if ($stmt->execute()) {
      return 'Yes'; // Data berhasil diperbarui
    } else {
      return 'No'; // Gagal memperbarui data
    }
    $stmt->close();
  }

  public function saveIncome($arr) {
    $date_income = $this->conn->real_escape_string($arr['date_income']);
    $name_income = $this->conn->real_escape_string($arr['name_income']);
    $wallet_select = $this->conn->real_escape_string($arr['wallet_select']);
    $value_income = $this->conn->real_escape_string($arr['value_income']);
    $info_income = $this->conn->real_escape_string($arr['info_income']);
    $user_id = $this->conn->real_escape_string($arr['user_id']);

    $date = date("Y-m-d H:i:s");

    // Prepare SQL statement
    $sql = "INSERT INTO incomes 
            ( user_id, amount, description, date, category_id, wallet_id, created_at) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?)";
    // Persiapan pernyataan (prepared statement
    $stmt = $this->conn->prepare($sql);

    // Melindungi dari serangan SQL Injection dengan menggunakan bind parameter
    $stmt->bind_param("isssiis", $user_id, $value_income, $info_income, $date_income, $name_income, $wallet_select, $date);
    
    // Eksekusi pernyataan
    if ($stmt->execute()) {
      return 'Yes'; // Data berhasil diperbarui
    } else {
      return 'No'; // Gagal memperbarui data
    }
    $stmt->close();
  }

  public function listCategory($id) {
    $html = '<option value="">Pilih Kategori</option>';
    $sql = "SELECT * FROM incomes_category WHERE user_id = '$id'";
    $result = $this->conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $category_id = $row['category_id'];
      $name = $row['name'];
      $html .='<option value="'.$category_id.'">'.$name.'</option>';
    }
    $result->close();
    return $html;
  }

  public function listMonthIncome($id) {
    $html = '<option value="All" selected>Pilih Semua</option>';
    $sql = "SELECT CONCAT(YEAR(date),'-',MONTH(date)) AS date  FROM `incomes` GROUP BY MONTH(date) ORDER BY MONTH(date) DESC";
    $result = $this->conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $date = $row['date'];
      $html .='<option value="'.$date.'">'.$date.'</option>';
    }
    $result->close();
    return $html;
  }

  public function incomeTransaction($id, $month) {
    $no = 0;
    $data = [];
    $sql = "SELECT
              ic.`name`,
              s.description,
              s.date,
              s.amount 
            FROM
              incomes s
              JOIN incomes_category ic ON s.category_id = ic.category_id ";
    if ($month == '' || $month === null) {
      $month = 'All';
    }
    
    if ($month != 'All') {
      $sql .="WHERE s.date LIKE '%$month%' AND s.user_id = '$id' ORDER BY date ASC";
    } else {
      $sql .="WHERE s.user_id = '$id' ORDER BY s.date ASC";
    }
    
    $result = $this->conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $no++;
      $name_category = $row['name'];
      $info = $row['description'];
      $date = date("d M Y", strtotime($row['date']));
      $nominal = $row['amount'];
      $rupiah = 'Rp ' . number_format($nominal, 0, ',', '.');
      $aksi = '<a href="#" class=""><i class="bi bi-pencil-square"></i></a>
      <a href="#" class=""><i class="bi bi-trash"></i></a>';
      $data[] = array(
        "No" => $no++,
        "Category" => $name_category,
        "Info" => $info,
        "Date" => $date,
        "Nominal" => $rupiah,
        "Aksi" => $aksi
      );
    }
    $result->close();
    return $data;
  }
}