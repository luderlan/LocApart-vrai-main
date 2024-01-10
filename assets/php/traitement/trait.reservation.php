<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.reservation.php");

$oReservation = new Reservation($con);

$action = isset($_POST['ajoutCli']) ? 'ajout' : (isset($_POST['updateCli']) ? 'update' : (isset($_GET['action']) && $_GET['action'] == 'deleteCli' ? 'delete' : ''));


if (isset($_POST['deleteRes'])) {
    $id_reservation = $_POST['deleteRes'];
    $oReservation->deleteRes($id_reservation);
    header("location:../affichage/index.php");
}


if ($_POST["action"] == "add") {

  

    $titre = $_POST["titre"];
    $date_rese = $_POST["date_rese"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $commentaire = $_POST["commentaire"];
    $moderation = $_POST["moderation"];
    $annulation = $_POST["annulation"];
    $id_bien = $_POST["id_bien"];
    $id_client = $_POST["id_client"];

    $oReservation->insertRes($titre,$date_rese,$start,$end,$commentaire,$moderation,$annulation,$id_bien,$id_client);


   // header("location:../affichage/index.php");
}

if (isset($_GET['view'])) {

    $id_reservation = $_GET["id_reservation"];
    $titre = $_GET["titre"];
    $date_rese = $_GET["date_rese"];
    $start = $_GET["start"];
    $end = $_GET["end"];
    $commentaire = $_GET["commentaire"];
    $moderation = $_GET["moderation"];
    $annulation = $_GET["annulation"];
    $id_bien = $_GET["id_bien"];
    $id_client = $_GET["id_client"];

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $stmt = $pdo->prepare("SELECT `id_reservation`, `titre`, `date_rese`, `start`, `end`, `commentaire`, `moderation`, `annulation`, `id_bien`, `id_client`
    FROM `reservation` WHERE id_reservation = $id_reservation");

    // Liaison des paramètres
    $stmt->bindParam(':id_reservation', $id_reservation, PDO::PARAM_STR);

    // Exécution de la requête préparée
    $stmt->execute();

    // Récupération des résultats
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Conversion en format JSON et sortie
    echo json_encode($events);
    exit;
}
?>