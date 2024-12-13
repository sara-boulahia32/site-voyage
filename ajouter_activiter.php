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

    $sql = "INSERT INTO activites (titre, description, destination, prix, date_debut, date_fin, places_disponibles) VALUES ('$titre', '$description', '$destination', '$prix', '$date_debut', '$date_fin', '$places_disponibles')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Activité ajoutée avec succès !'); window.location.href='activites.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
