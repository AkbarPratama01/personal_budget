<?php
include "../config/db_connection.php";

class register {
    private $conn;

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->connect();
    }

    public function getRegister($fullname, $email, $password) {
        $created_at = date('Y-m-d H:i:s');
        $sql_cek_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql_cek_email);

        if ($result->num_rows > 0) {
            return 'Ada';
        } else {
            // insert data
            $sql_insert = "INSERT INTO users (name, email, password, created_at) VALUES ('$fullname','$email','$password', '$created_at')";

            if ($this->conn->query($sql_insert) === TRUE) {
                return 'Ok';
            } else {
                return 'No';
                // echo $this->conn->error;
            }
            
        }
        
    }
}

?>