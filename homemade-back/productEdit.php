<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include "connexion.php";
$request = file_get_contents("php://input");
$data = json_decode($request);

$id = $data->id;
$title = $data->title;
$proprietor = $data->proprietor;
$type = $data->type;
$disc = $data->disc;
$prix = $data->prix;
$qt = $data->quantité;
$image = $data->image;

//$image = $data['file']['name'];

$requete = "UPDATE products SET title='" . $title . "', proprietor='" . $proprietor . "' , type='" . $type . "',
                                disc='" . $disc . "' , prix='" . $prix . "' , quantité='" . $qt . "' ,
                                image ='" . $image . "' WHERE id=" . $id;

if (!$mysqli->query($requete)) {
    echo "Update echouée: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "success";
}
