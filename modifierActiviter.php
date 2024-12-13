<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $date_debut = mysqli_real_escape_string($conn, $_POST['date_debut']);
    $date_fin = mysqli_real_escape_string($conn, $_POST['date_fin']);
    $places_disponibles = mysqli_real_escape_string($conn, $_POST['places_disponibles']);
    $prix = (float)$_POST['prix'];
   

    $sql = "UPDATE activites SET 
    titre = '$titre', 
    description = '$description', 
    destination = '$destination', 
    prix = '$prix', 
    date_debut = '$date_debut', 
    date_fin = '$date_fin' ,
    places_disponibles = '$places_disponibles' ,
    WHERE id_activite = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Activité modifié avec succès !'); window.location.href='client.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
