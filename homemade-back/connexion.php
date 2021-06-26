<?php
$host = 'localhost';
$root = 'root';
$mdp = '';
$db = 'homemade';
// Connexion au serveur de données
$mysqli = new mysqli($host, $root, $mdp, $db);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
