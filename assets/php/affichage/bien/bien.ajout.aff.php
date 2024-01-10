<?php
        require_once("../../include/connexion.inc.php");
        require_once("../../class/class.bien.php");
?>
d
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biens - Loc'Appart</title>
    <script type="text/javascript" src="../../../js/autocomp/jquery.min.js"></script>
        <script type="text/javascript" src="../../../js/autocomp/script.bien.js"></script>
    <script type="text/javascript" src="../../../js/autocomp/script.bien.aj.ville.js"></script>
    <link rel="stylesheet" href="../../../css/style.bien.css">
</head>

<body>

    <?php include("../../template/header.php"); ?>

    <button class="bouton" onclick="redirectToHeader()">
        <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
            <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z" fill="#323232"></path>
        </svg>
        <span>Retour</span>
    </button>

    <script>
        function redirectToHeader() {
        window.location.href = "bien.aff.php";
        }
    </script>

    <br><br><br>

    <main>
        <section class="conteneur" id="tableau_bien">
            <form action="../../traitement/trait.bien.php" method="post" class="formulaire-insertion">

                <label for="nom_bien" class="formulaire-label">Nom bien : </label>
                <input type="text" name="nom_bien" id="nom_bien" class="formulaire-input">

                <label for="rue_bien" class="formulaire-label">Rue bien : </label>
                <input type="text" name="rue_bien" id="rue_bien" class="formulaire-input"> 

                <label for="vil_bien" class="formulaire-label">Ville bien : </label>
                <input type="text" id="vil_bien" name="vil_bien" onkeyup="autocomplet()">
				<input type="hidden" id="codeP_bien" name="codeP_bien">
                <ul id="aj_ville" name="aj_ville"></ul> <br>    

                <label for="sup_bien" class="formulaire-label">Superficie bien : </label>
                <input type="text" name="sup_bien" id="sup_bien" class="formulaire-input">

                <label for="nb_couchage" class="formulaire-label">Nombre de couchage : </label>
                <input type="text" name="nb_couchage" id="nb_couchage" class="formulaire-input">

                <label for="nb_piece" class="formulaire-label">Nombre de pieces : </label>
                <input type="text" name="nb_piece" id="nb_piece" class="formulaire-input">

                <label for="nb_chambre" class="formulaire-label">Nombre de chambre : </label>
                <input type="text" name="nb_chambre" id="nb_chambre" class="formulaire-input">

                <label for="descriptif" class="formulaire-label">Descriptif : </label>
                <input type="text" name="descriptif" id="descriptif" class="formulaire-input">

                <label for="ref_bien" class="formulaire-label">Reference du bien : </label>
                <input type="text" name="ref_bien" id="ref_bien" class="formulaire-input">

                <label for="statut_bien" class="formulaire-label">Statut du bien : </label>
                <input type="text" name="statut_bien" id="statut_bien" class="formulaire-input">

                <label for="id_type_bien" class="formulaire-label">Type de bien : </label>
                <input type="text" name="id_type_bien" id="id_type_bien" onkeyup="autocompletBien()" class="formulaire-input">
                <input type="hidden" name="id_type_bien2" id="id_type_bien2" class="formulaire-input">
                <ul id="type_list_id" name="type_list_id"></ul>

                <input type="submit" value="Ajouter un bien" name='ajout' class="bouton-primaire">
            </form>
        </section>
    </main>
    
</body>
</html>