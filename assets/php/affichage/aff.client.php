<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.client.php");
    require_once("../class/class.comm.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/script.client.js"></script>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/style.client.css">
</head>

<body>

    <?php include("../template/header.php"); ?>

    <button class="bouton" onclick="redirectToHeader()">
        <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
            <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z" fill="#323232"></path>
        </svg>
        <span>Retour</span>
    </button>

    <script>
        function redirectToHeader() {
            window.location.href = "../template/header.php";
        }
    </script>

    <br><br><br>

    <main>
        <section class="conteneur" id="tableau_Clients">
            <form action="../traitement/trait.client.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Clients</th>
                            <th>Nom client</th>
                            <th>Prenom client</th>
                            <th>Rue client</th>
                            <th>Code Postal client</th>
                            <th>Mail client</th>
                            <th>Mdp client</th>
                            <th>Statut client</th>
                            <th>Valid client</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oClient = new Client($con);
                        $result = $oClient->selectClient();
                        $oCommunes = new Communes($con);
                        // $resultat = $oCommunes->selectCommune();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>", $row['id_client'], "</td>";
                                echo "<td><input type='text' name='nom_client[", $row['id_client'], "]' value='", $row['nom_client'], "'></td>";
                                echo "<td><input type='text' name='prenom_client[", $row['id_client'], "]' value='", $row['prenom_client'], "'></td>";
                                echo "<td><input type='text' name='rue_client[", $row['id_client'], "]' value='", $row['rue_client'], "'></td>";
                                echo "<td><input type='text' name='id_comm[", $row['id_client'], "]' value='", $row['id_comm'], "'></td>";
                                echo "<td><input type='text' name='mail_client[", $row['id_client'], "]' value='", $row['mail_client'], "'></td>";
                                echo "<td><input type='text' name='pass_client[", $row['id_client'], "]' value='", $row['pass_client'], "'></td>";
                                echo "<td><input type='text' name='statut_client[", $row['id_client'], "]' value='", $row['statut_client'], "'></td>";
                                echo "<td><input type='text' name='valid_client[", $row['id_client'], "]' value='", $row['valid_client'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='updateCli' value='", $row['id_client'], "' type=submit'>Modifier</button>
                                    <button class='btn btn-danger' name='deleteCli' value='", $row['id_client'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }                            
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            
            <form action="../traitement/trait.client.php" method="post" class="formulaire-insertion">
                <label for="nom_client" class="formulaire-label">Nom Client : </label>
                <input type="text" name="nom_client" id="nom_client" class="formulaire-input">
                <label for="prenom_client" class="formulaire-label">Prenom Client : </label>
                <input type="text" name="prenom_client" id="prenom_client" class="formulaire-input">
                <label for="rue_client" class="formulaire-label">Rue client : </label>
                <input type="text" name="rue_client" id="rue_client" class="formulaire-input">
                <label for="vil_client" class="formulaire-label">Ville : </label>
                <div class="input_container">
                    <input type="text" name="vil_client" id="vil_client" onkeyup="autocomplet()" class="formulaire-input">
                    <input type="hidden" name="id_comm" id="id_comm" class="formulaire-input">
                    <ul id="id_list_ville"></ul>
                </div>
                <label for="mail_client" class="formulaire-label">Mail client : </label>
                <input type="text" name="mail_client" id="mail_client" class="formulaire-input">
                <label for='pass_client' class='formulaire-label'>Mot de passe client : </label>
                <input type='password' name='pass_client' id='pass_client' class='formulaire-input'>
                <label for="statut_client" class="formulaire-label">Statut du client : </label>
                <input type="text" name="statut_client" id="statut_client" class="formulaire-input">
                <label for="valid_client" class="formulaire-label">Client valide ? </label>
                <input type="text" name="valid_client" id="valid_client" class="formulaire-input">
                <input type="submit" value="Ajouter un Client" class="bouton-primaire" name="ajoutCli">
            </form>
        </section>
    </main>
</body>
</html>