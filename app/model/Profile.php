<?php
include "../config/db_connection.php";

class profile{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->connect();
    }

    public function get_profile($id) {
        $data = array();
        //make query
        $sql = "SELECT * FROM users_profile WHERE user_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            # data ada
            $data['status'] = 'profile ada';
            $row = $result->fetch_assoc();

            $name = $row['name'];
            $gender = $row['gender'];
            $info = $row['information'];
            $img = $row['img'];
            $phone = $row['phone'];
            $email = $row['email'];

            $data['fullname'] = $name;
            $data['email'] = $email;
            $data['gender'] = $gender;
            $data['information'] = $info;
            $data['img'] = $img;
            $data['phone'] = $phone;
        } else {
            # data tidak ada
            //get users
            $sql_users = "SELECT * FROM users WHERE user_id = '$id'";
            $result_users = $this->conn->query($sql_users);
            if ($result_users->num_rows > 0) {
                # users ada
                $data['status'] = 'user ada';
                $row = $result_users->fetch_assoc();
                $name = $row['name'];
                $email = $row['email'];

                $data['fullname'] = $name;
                $data['email'] = $email;
            } else {
                # users tidak ada
                $data['status'] = 'user tidak ada';
            }
        }
        
        return $data;
    }
}