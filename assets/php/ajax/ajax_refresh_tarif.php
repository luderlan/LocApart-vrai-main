<?php


 // puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDDD 
 
	include '../include/connexion.inc.php';


$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM biens WHERE nom_bien LIKE (:var) ORDER BY nom_bien ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listebien = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_bien'].' '.$res['id_bien']);
	// sélection 
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['nom_bien'].' '.$res['id_bien']).'\',\''.str_replace("'", "\'",$res['id_bien']).'\')">'.$Listebien.'</li>';
}
?>
