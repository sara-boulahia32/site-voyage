<?php
include('config.php');

// Récupérer les réservations pour le client connecté
$id_client = 1; // Remplacer par l'ID du client connecté
$sql = "
    SELECT reservations.id_reservation, activites.titre, activites.prix, reservations.date_reservation, reservations.statut
    FROM reservations
    JOIN activites ON reservations.id_activite = activites.id_activite
    WHERE reservations.id_client = '$id_client'
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur lors de la récupération des réservations : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Mes Réservations</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="activites.php">Activités</a>
        </nav>
    </header>

    <main>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Activité</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reservation = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($reservation['titre']) ?></td>
                            <td><?= htmlspecialchars($reservation['prix']) ?> €</td>
                            <td><?= htmlspecialchars($reservation['date_reservation']) ?></td>
                            <td><?= htmlspecialchars($reservation['statut']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune réservation trouvée.</p>
        <?php endif; ?>
    </main>
</body>
</html>
