<?php
include "connexion.php";
$trp = mysqli_query($mysqli, "SELECT * from products where type = 'Decoration'");
$rows = array();
while ($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
}
print json_encode($rows); //convert php data to json data
