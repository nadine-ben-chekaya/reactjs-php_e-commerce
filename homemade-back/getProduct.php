<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include "connexion.php";
$id = (int) $_GET['id'];
$trp = mysqli_query($mysqli, "SELECT * from products where id = $id");
$rows = array();
while ($r = mysqli_fetch_assoc($trp)) {
    //$rows[] = $r;
    // print json_encode($rows); //convert php data to json data
    print json_encode($r);
}
