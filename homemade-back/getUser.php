<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$request = file_get_contents("php://input");
$data = json_decode($request);
$id = $data->id;

//connect to the DB
include "connexion.php";

$query = "select * from user where id='$id'";
$res = $mysqli->query($query);

$trp = mysqli_query($conn, "SELECT * from user");
$rows = array();
while ($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
}
echo json_encode(["success" => 1, "user" => $rows]);//convert php data to json data
