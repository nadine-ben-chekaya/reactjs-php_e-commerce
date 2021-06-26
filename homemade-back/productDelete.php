<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include "connexion.php";
$id = (int) $_GET['id'];
$requete = "DELETE from products where id = $id";
if (!$mysqli->query($requete)) {
    echo "Delete echouee: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    // echo "success";
    echo json_encode(["success" => 1]);
}
