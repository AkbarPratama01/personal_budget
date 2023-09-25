<?php
session_start();
require_once "../model/Profile.php";

$func = $_GET['func'];

if ($func == 'getProfile') {
    $user_id = $_GET['id'];

    $user = new profile();
    $result = $user->get_profile($user_id);
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode($result);
    }
}