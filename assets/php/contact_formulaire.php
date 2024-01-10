<?php

require_once("include/connexion.inc.php");
require_once("class/class.contact.php");

    $prenom = ($_POST["prenom"]);
    $nom = ($_POST["nom"]);
    $email = ($_POST["email"]);
    $telephone = ($_POST["telephone"]);
    $message = ($_POST["message"]);

    $oContact = new Contact($con);
    $oContact->insertContact($prenom,$nom,$email,$telephone,$message);
    header("location:../../interface/contact.html");
?>