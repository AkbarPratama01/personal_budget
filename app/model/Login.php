<?php
include "../config/db_connection.php";

class login{
  private $conn;

  public function __construct()
  {
    $dbConnection = new DBConnection();
    $this->conn = $dbConnection->connect();
  }

  public function getLogin($username, $password) {
    // Sanitize input to prevent SQL injection
    $username = $this->conn->real_escape_string($username);
    $password = $this->conn->real_escape_string($password);

    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    // Execute query
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['name'] = $row['name'];

      $this->close();

      return true;
    } else {
      return false;
    }
  }
  private function close()
  {
      $this->conn->close();
  }
}

?>