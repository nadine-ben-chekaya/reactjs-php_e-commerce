<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
/* na5ou data mel form :When information is sent to the server
via a POST request, it is saved in a temporary file.*/
$folderPath = "upload-react/";



$request = file_get_contents("php://input");
$data = json_decode($request);
$title = $data->title;
$proprietor = $data->proprietor;
$type = $data->type;
$disc = $data->disc;
$prix = $data->prix;
$qt = $data->quantité;
$image = $data->image;
//upload image
/*$folderPath = "upload-react/";
$file_tmp = $_FILES['image']['tmp_name'];
$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
$file = $folderPath . uniqid() . '.' . $file_ext;
move_uploaded_file($file_tmp, $file);*/
//connect to the DB
include "connexion.php";

if ($title && $proprietor && $type && $disc && $prix && $qt) {

    $requete = "insert into products(title,proprietor,type,disc,prix,quantité,image) 
        VALUES ('$title','$proprietor','$type','$disc','$prix','$qt','$image')";
    if (!$mysqli->query($requete)) {
        echo "Insertion échouée: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
        echo "success";
    }
} else {
    echo $title;
}
