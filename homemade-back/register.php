
<?php
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
/* na5ou data mel form :When information is sent to the server
via a POST request, it is saved in a temporary file.*/

$request = file_get_contents("php://input");
$data = json_decode($request);
$firstname = $data->firstname;
$lastname = $data->lastname;
$username = $data->username;
$email = $data->email;
$phone = $data->phone;
$pw = $data->password;
$rpw = $data->rpassword;
//connect to the DB
include "connexion.php";
if ($firstname & $lastname &  $username & $email & $phone & $pw & $rpw) {

    // verifier ennou email mech mawjoud mennou 
    $requete = "select * from user where email='$email'";
    $res = $mysqli->query($requete);
    if ($res->num_rows) {
        echo "email deja exist";
    } elseif ($pw === $rpw) {
        $requete = "insert into user(firstname,lastname,username,email,phone,password) values('$firstname','$lastname','$username','$email','$phone',md5('$pw'))";
        if (!$mysqli->query($requete)) {
            echo "Insertion échouée: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            echo "success";
        }
    } else
        echo "les deux mots de passe ne sont pas identiques";
} else {
    echo "veuillez remplir tous les champs";
}
?>
