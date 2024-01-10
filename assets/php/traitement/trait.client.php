<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.client.php");

$oClient = new client($con);

$action = isset($_POST['ajoutCli']) ? 'ajout' : (isset($_POST['updateCli']) ? 'update' : (isset($_POST['deleteCli']) ? 'delete' : ''));

switch ($action) {
    case 'ajout':
        $nvNomClient = $_POST['nom_client'];
        $nvPrenomClient = $_POST['prenom_client'];
        $nvRueClient = $_POST['rue_client'];
        $nvCodeComm = $_POST['id_comm'];
        $nvMailClient = $_POST['mail_client'];
        $nvPassClient = password_hash($_POST['pass_client'], PASSWORD_DEFAULT);
        $nvStatutClient = $_POST['statut_client'];
        $nvValidClient = $_POST['valid_client'];

        $oNouveauClient = new Client($con);
        $oNouveauClient->insertClient($nvNomClient, $nvPrenomClient, $nvRueClient, $nvCodeComm, $nvMailClient, $nvPassClient, $nvStatutClient, $nvValidClient);

        header("location:../affichage/aff.client.php");
        break;

    case 'update':
        if (isset($_POST['updateCli'])) {
            $id_client = $_POST['updateCli'];
            $nom_client = $_POST['nom_client'][$id_client];
            $prenom_client = $_POST['prenom_client'][$id_client];
            $rue_client = $_POST['rue_client'][$id_client];
            $id_comm = $_POST['id_comm'][$id_client];
            $mail_client = $_POST['mail_client'][$id_client];
            $pass_client = $_POST['pass_client'][$id_client];
            $statut_client = $_POST['statut_client'][$id_client];
            $valid_client = $_POST['valid_client'][$id_client];

            $oClient->updateClient($id_client, $nom_client, $prenom_client, $rue_client, $id_comm, $mail_client, $pass_client, $statut_client, $valid_client);

            header("location:../affichage/aff.client.php");
        }
        break;

    case 'delete':
        $id_client = $_POST['deleteCli'];
        $oClient->deleteClient($id_client);
        header("location:../affichage/aff.client.php");
        break;
}
?>
