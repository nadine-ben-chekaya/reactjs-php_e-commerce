<?php

header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$request = file_get_contents("php://input");
$data = json_decode($request);
$username = $data->username;
$pw = $data->password;

include "connexion.php";

if ($username & $pw) {
    $pw = md5($pw);


    // $password_hash = $res['password'];
    $trp = mysqli_query($mysqli, "select * from user where username='$username'");
    $rows = array();

    while ($row = $trp->fetch_assoc()) {
        if ($trp->num_rows) {
            $password_hash = $row['password'];

            if ($pw === $password_hash) {

                echo json_encode(["success" => 1, "user" => $row]);
            } else {

                echo json_encode(["success" => 0, "msg" => "invalid password"]);
            }
        } else {
            echo json_encode(["success" => 0, "msg" => "No user account linked to this email address"]);
        }
    }
} else {
    echo json_encode(["success" => 0, "msg" => "kamel 3amer"]);
}
