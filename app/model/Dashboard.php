<?php
include "../config/db_connection.php";

class Dashboard{
  private $conn;

  public function __construct()
  {
    $dbConnection = new DBConnection();
    $this->conn = $dbConnection->connect();
  }

  public function getDataDashboard($id) {
    $user_id = $this->conn->real_escape_string($id);

    //query total pemasukkan
    $query_total_pemasukkan = '';
  }

  private function close()
  {
      $this->conn->close();
  }
}

?>