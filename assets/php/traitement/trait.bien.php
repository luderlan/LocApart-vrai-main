<<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.bien.php");

$oBiens = new bien($con);

$action = isset($_POST['ajout']) ? 'ajout' : (isset($_POST['update']) ? 'update' : (isset($_POST['delete']) ? 'delete' : ''));

switch ($action) {
  case 'ajout':
    $nouveauNomBien = $_POST['nom_bien'];
    $nouveauRueBien = $_POST['rue_bien'];
    $nouveauCodePBien = $_POST['codeP_bien'];
    $nouveauVilleBien = $_POST['vil_bien'];
    $nouveauSupBien = $_POST['sup_bien'];
    $nouveauNBCouchage = $_POST['nb_couchage'];
    $nouveauNBPiece = $_POST['nb_piece'];
    $nouveauNBChambre = $_POST['nb_chambre'];
    $nouveauDescriptif = $_POST['descriptif'];
    $nouveauRefBien = $_POST['ref_bien'];
    $nouveauStatutBien = $_POST['statut_bien'];
    $nouveauIdTypeBien = $_POST['id_type_bien2'];

    $oNouveauBien= new bien($con);

    $oNouveauBien->insertBien($nouveauNomBien, $nouveauRueBien, $nouveauCodePBien, $nouveauVilleBien, $nouveauSupBien, $nouveauNBCouchage,
    $nouveauNBPiece, $nouveauNBChambre, $nouveauDescriptif, $nouveauRefBien, $nouveauStatutBien,$nouveauIdTypeBien);

    header("location:../affichage/bien/bien.aff.php");

  case 'update':
    $id_bien = $_POST['id_bien'];
    $nom_bien = $_POST['nom_bien']; 
    $rue_bien = $_POST['rue_bien'];
    $codeP_bien = $_POST['codeP_bien'];
    $vil_bien = $_POST['vil_bien'];
    $sup_bien = $_POST['sup_bien'];
    $nb_couchage = $_POST['nb_couchage'];
    $nb_piece = $_POST['nb_piece'];
    $nb_chambre = $_POST['nb_chambre'];
    $descriptif = $_POST['descriptif'];
    $ref_bien = $_POST['ref_bien'];
    $statut_bien = $_POST['statut_bien'];
    $id_type_bien = $_POST['id_type_bien'];

    $oBiens->updateBien($id_bien, $nom_bien, $rue_bien, $codeP_bien, $vil_bien, $sup_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien, $id_type_bien);

    header("location:../affichage/bien/bien.aff.php");

  case 'sup':
    $id_bien = $_GET['id'];
    $oBiens->deleteBien($id_bien);
    
    header("location:../affichage/bien/bien.aff.php");
}
?>