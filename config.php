<?php
$host = "localhost";
$dbname = "voyage";
$user = "root";
$password = "Sara123@";

// Connexion MySQLi
$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>
