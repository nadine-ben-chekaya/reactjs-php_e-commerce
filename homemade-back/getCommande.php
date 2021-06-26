<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include "connexion.php";
$id = (int) $_GET['id'];
$trp = mysqli_query($mysqli, "SELECT productid from commande where userid = $id");

while ($r = mysqli_fetch_assoc($trp)) {
    $idp = intval($r["productid"]);
    //echo $idp;
    $tr = mysqli_query($mysqli, "SELECT * from products where id = $idp");
    //  echo $tr;

    while ($r = mysqli_fetch_assoc($tr)) {

        print json_encode($r);
    }
    // print json_encode($r);
}
