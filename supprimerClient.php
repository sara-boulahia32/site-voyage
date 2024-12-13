<?php

include "config.php";

$ID = intval($_GET["id_client"]);

$sql = "DELETE FROM clients WHERE id_client = $ID";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Client supprimé avec succès !'); window.location.href='client.php';</script>";
} else {
    echo "Erreur : " . mysqli_error($conn);
}