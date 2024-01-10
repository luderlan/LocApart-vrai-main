<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/tarif.class.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif de biens - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/autocomp/script.tarif.js"></script>
    <link rel="stylesheet" href="../../css/style.tarif.css">
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
            window.location.href = "../affichage/bien.modif.aff.php";
        }
    </script>

    <br><br><br>

    <main>
        <section class="conteneur" id="tableau_tarif">
            <form action="../traitement/trait.tarif.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Tarif</th>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            <th>Prix</th>
                            <th>ID Bien</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oTarif = new tarif($con);
                        $result = $oTarif->selectTarif();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                
                                $dd = 'dd_tarif'.$row['id_tarif'];
                                $df = 'df_tarif'.$row['id_tarif'];
                                $p = 'prix_loc'.$row['id_tarif'];
                                $idb = 'id_bien'.$row['id_tarif'];

                                echo "<tr>";
                                echo "<td>", $row['id_tarif'], "</td>";
                                echo "<td><input type='text' name='$dd' value='", $row['dd_tarif'], "'></td>";
                                echo "<td><input type='text' name='$df' value='", $row['df_tarif'], "'></td>";
                                echo "<td><input type='text' name='$p' value='", $row['prix_loc'], "'></td>";
                                echo "<td><input type='text' name='$idb' value='", $row['id_bien'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='updateTarif' value='", $row['id_tarif'], "' type=submit'>Modifier</button>
                                <button class='btn btn-danger' name='deleteTarif' value='", $row['id_tarif'], "' type=submit'>Supprimer</button></td>";
                                
                                echo "</tr>";

                            }
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>

            <form action="../traitement/trait.tarif.php" method="post" class="formulaire-insertion">

                <label for="dd_tarif" class="formulaire-label">Date de debut : </label>
                <input type="date" name="dd_tarif" id="dd_tarif" class="formulaire-input">

                <label for="df_tarif" class="formulaire-label">Date de fin : </label>
                <input type="date" name="df_tarif" id="df_tarif" class="formulaire-input">

                <label for="prix_loc" class="formulaire-label">Prix : </label>
                <input type="text" name="prix_loc" id="prix_loc" class="formulaire-input">
                
                <label for="id_bien" class="formulaire-label">Bien : </label>
                <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                <input type="hidden" name="id_bien2" id="id_bien2" class="formulaire-input">
                <ul id="bien_list_id"> </ul>

                <button class='btn btn-danger' name='ajoutTarif' value='", $row['id_tarif'], "' type=submit'>Ajouter</button></td>";
            </form>
        </section>
    </main>
</body>
</html>