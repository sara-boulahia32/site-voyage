<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $mot_de_passe = mysqli_real_escape_string($conn, $_POST['mot_de_passe']);
   

    $sql = "INSERT INTO clients (nom,prenom,email,telephone,adresse,date_naissance,mot_de_passe) VALUES ('$nom','$prenom','$email','$telephone','$adresse','$date','$mot_de_passe')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Client ajouté avec succès !'); window.location.href='client.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
