<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.type_bien.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type de biens - Loc'Appart</title>
    <link rel="stylesheet" href="../../css/style.typeBien.css">
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
        <section class="conteneur" id="tableau_typebien">
            <form action="../traitement/trait.type_bien.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Type Bien</th>
                            <th>Libellé Type Bien</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oTypes = new type_bien($con);
                        $result = $oTypes->selectTypeBien();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>", $row['id_type_bien'], "</td>";
                                echo "<td><input type='text' name='lib_type_bien[", $row['id_type_bien'], "]' value='", $row['lib_type_bien'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='updateTB' value='", $row['id_type_bien'], "' type=submit'>Modifier</button>
                                <button class='btn btn-danger' name='deleteTB' value='", $row['id_type_bien'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>

            <form action="../traitement/trait.type_bien.php" method="post" class="formulaire-insertion">
                <label for="lib_type_bien" class="formulaire-label">Nouveau type de bien : </label>
                <input type="text" name="lib_type_bien" id="lib_type_bien" class="formulaire-input">
                <input type="submit" value="Ajouter un type de bien" class="bouton-primaire" name='ajoutTB'>
            </form>
        </section>
    </main>
</body>
</html>