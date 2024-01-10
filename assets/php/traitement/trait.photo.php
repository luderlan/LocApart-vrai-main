<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

$oPhoto = new Photo($con);

$action = isset($_POST['ajoutPho']) ? 'ajout' : (isset($_POST['updatePho']) ? 'update' : (isset($_POST['deletePho']) ? 'delete' : ''));

switch ($action) {
    case 'ajout':
        $nvNomPhoto = $_POST['nom_photo'];
        $nvLienPhoto = $_POST['lien_photo'];
        $nouveauIdBien = $_POST['id_bien2'];
        
        $oNouveauPhoto= new Photo($con);
        $oNouveauPhoto->insertPhoto($nvNomPhoto, $nvLienPhoto, $nouveauIdBien);
        
        header("location:../affichage/aff.photo.php");
        break;

    case 'update':
        if (isset($_POST['updatePho'])) {
            $id_photo = $_POST['updatePho'];
            $nom_photo = $_POST['nom_photo'][$id_photo];
            $lien_photo = $_POST['lien_photo'][$id_photo];
            $id_bien = $_POST['id_bien'][$id_photo];
        
        $oPhoto->updatePhoto($id_photo, $nom_photo,$lien_photo,$id_bien);

        header("location:../affichage/aff.photo.php");
        } 
        break;
        
    case 'delete':
        $id_photo = $_POST['deletePho'];
        $oPhoto->deletePhoto($id_photo);

        header("location:../affichage/aff.photo.php");
        break;
}
?>