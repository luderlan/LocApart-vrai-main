<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.type_bien.php");

$oTypeBien = new type_bien($con);

$action = isset($_POST['ajoutTB']) ? 'ajout' : (isset($_POST['updateTB']) ? 'update' : (isset($_POST['deleteTB']) ? 'delete' : ''));

switch ($action) {
    case 'ajout':
        $nouveauLibTypebien = $_POST['lib_type_bien'];

        $oNouveauType = new type_bien($con);
        $oNouveauType->insertTypeBien($nouveauLibTypebien);

        header("location:../affichage/aff.type_bien.php");
        break;

    case 'update':
        if (isset($_POST['updateTB'])) {
            $id_type_bien = $_POST['updateTB'];
            $lib_type_bien = $_POST['lib_type_bien'][$id_type_bien];

            $oTypeBien->updateTypeBien($id_type_bien, $lib_type_bien);

            header("location:../affichage/aff.type_bien.php");
        }
        break;

    case 'delete':
        $id_type_bien = $_POST['deleteTB'];
        $oTypeBien->deleteTypeBien($id_type_bien);

        header("location:../affichage/aff.type_bien.php");
        break;

}
?>