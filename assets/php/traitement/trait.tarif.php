<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.tarif.php");

$oTarif = new tarif($con);

$action = isset($_POST['ajoutTarif']) ? 'ajout' : (isset($_POST['updateTarif']) ? 'update' : (isset($_POST['deleteTarif']) ? 'delete' : ''));

switch ($action) {
  
    case 'ajout':
        $nouveauDDTarif = $_POST['dd_tarif'];
        $nouveauDFTarif = $_POST['df_tarif'];
        $nouveauPrixLoc = $_POST['prix_loc'];
        $nouveauIdBien = $_POST['id_bien2'];

        $oNouveauTarif= new tarif($con);

        $oNouveauTarif->insertTarif($nouveauDDTarif, $nouveauDFTarif, $nouveauPrixLoc, $nouveauIdBien);
        break;

    case 'update':
        if (isset($_POST['updateTarif'])) {
            $id_tarif = $_POST['updateTarif'];
            $dd = $_POST['dd_tarif'][$id_tarif];
            $df = $_POST['df_tarif'][$id_tarif];
            $pl = $_POST['prix_loc'][$id_tarif];
            $idb = $_POST['id_bien'][$id_tarif];

            $oTarif->updateTarif($id_tarif, $dd, $df, $pl, $idb);

            header("location:../affichage/bien.modif.aff.php");
        }

    case 'delete':
        $id_tarif = $_POST['deleteTarif'];
        $oTarif->deleteTarif($id_tarif);
        header("location:../affichage/aff.client.php");
        break;
}
?>