<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_client = 1; // Remplacer par l'ID du client connecté
    $id_activite = $_POST['id_activite'];

    $sql = "INSERT INTO reservations (id_client, id_activite) VALUES ('$id_client', '$id_activite')";
    if (!mysqli_query($conn, $sql)) {
        die("Erreur lors de la réservation : " . mysqli_error($conn));
    }

    header("Location: reservations.php");
    exit();
}

$id_activite = $_GET['id'];
$sql = "SELECT * FROM activites WHERE id_activite = '$id_activite'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur lors de la récupération de l'activité : " . mysqli_error($conn));
}

$activite = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver <?= htmlspecialchars($activite['titre']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Réserver une Activité</h1>
    </header>

    <main>
        <h2><?= htmlspecialchars($activite['titre']) ?></h2>
        <p><?= htmlspecialchars($activite['description']) ?></p>
        <form method="POST">
            <input type="hidden" name="id_activite" value="<?= $id_activite ?>">
            <button type="submit">Confirmer la Réservation</button>
        </form>
    </main>
</body>
</html>
