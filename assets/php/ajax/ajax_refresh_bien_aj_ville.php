<?php
 
	include '../include/connexion.inc.php';


$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM communes_departement_region WHERE COL10 LIKE (:var) or COL3 LIKE (:var) ORDER BY COL10 ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listecomm = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['COL10'].' '.$res['COL3']);
	// sélection 
	// echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['COL3'].' '.$res['COL10']).'\',\''.str_replace("'", "\'", $res['id_comm']).'\')">'.$Listecomm.'</li>';
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['COL3'].' '.$res['COL10']).'\')">'.$Listecomm.'</li>';
}
?>
