<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
/* na5ou data mel form :When information is sent to the server
via a POST request, it is saved in a temporary file.*/

$request = file_get_contents("php://input");
$data = json_decode($request);
$userid = $data->userid;
$productid = $data->productid;
$prix = $data->prix;
$quantité = $data->quantité;
//connect to the DB
include "connexion.php";

//na5ou quantité total m table product 
/*$trp = mysqli_query($mysqli, "SELECT quantité from products where id = $productid");
$rows = array();
while ($r = mysqli_fetch_assoc($trp)) {
    $quantitéTotal = $r;
}*/

//ntesti ennou les champs mech 0 w ennou mizel fama quantité
if ($userid != 0  & $productid != 0 & $prix != 0 &  $quantité != 0) {

    $requete = "insert into commande(userid,productid,quantité,prix) values('$userid','$productid','$quantité','$prix')";
    if (!$mysqli->query($requete)) {
        echo "Insertion échouée: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {

        echo "insertion validee";
    }
}
