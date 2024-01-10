<?php
require_once("include/connexion.inc.php");

if (isset($_GET['id'])) {
    $idBien = $_GET['id'];

    // Assurez-vous de valider et d'échapper les données
    $idBien = filter_var($idBien, FILTER_VALIDATE_INT);

    if ($idBien !== false) {
        // Mettez à jour la base de données
        $query = "UPDATE biens SET favoris = 1 WHERE id_bien = :id_bien";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_bien', $idBien, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // La mise à jour a réussi
            echo "Mise à jour réussie";
        } else {
            // La mise à jour a échoué
            echo "Échec de la mise à jour";
        }
    } else {
        // ID invalide
        echo "ID invalide";
    }
} else {
    // ID non fourni
    echo "ID non fourni";
}
?>
