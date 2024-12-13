<?php

include "config.php";

$ID = intval($_GET["client_id"]);
$sql = "DELETE FROM activites WHERE id_client = $ID";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Activité supprimé avec succès !'); window.location.href='client.php';</script>";
} else {
    echo "Erreur : " . mysqli_error($conn);
}