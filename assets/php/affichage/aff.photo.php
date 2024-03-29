<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.photo.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/script.photo.js"></script>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/style.photo.css">
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
        <section class="conteneur" id="tableau_Photos">
            <form action="../traitement/trait.photo.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Photo</th>
                            <th>Nom Photo</th>
                            <th>Lien Photo</th>
                            <th>ID_bien</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oPhoto = new Photo($con);
                        $result = $oPhoto->selectPhoto();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>", $row['id_photo'], "</td>";
                                echo "<td><input type='text' name='nom_photo[", $row['id_photo'], "]' value='", $row['nom_photo'], "'></td>";
                                echo "<td><input type='text' name='lien_photo[", $row['id_photo'], "]' value='", $row['lien_photo'], "'></td>";
                                echo '<label for="id_bien" class="formulaire-label">bien : </label>
                                <div class="input_container">
                                    <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                                    <input type="text" name="id_bien2" id="id_bien2" class="formulaire-input">
                                    <ul id="id_list_bien"></ul>
                                </div>';
                                echo "<td><button class='btn btn-primary' name='updatePho' value='", $row['id_photo'], "' type=submit'>Modifier</button>
                                      <button class='btn btn-danger' name='deletePho' value='", $row['id_photo'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }                            
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            
            <form action="../traitement/trait.photo.php" method="post" class="formulaire-insertion">
                <label for="nom_photo" class="formulaire-label">Nom photo : </label>
                <input type="text" name="nom_photo" id="nom_photo" class="formulaire-input">
                <label for="lien_photo" class="formulaire-label">Lien photo : </label>
                <input type="text" name="lien_photo" id="lien_photo" class="formulaire-input">
                <label for="id_bien" class="formulaire-label">bien : </label>
                <div class="input_container">
                    <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                    <input type="text" name="id_bien2" id="id_bien2" class="formulaire-input">
                    <ul id="id_list_bien"></ul>
                </div>
                <input type="submit" value="Ajouter une Photo" class="bouton-primaire" name='ajoutPho'>
            </form>
        </section>
    </main>
</body>



                    echo "<td><select id="id_bien" name="id_bien">";
                                    $all_photo = $con->selectIdBien();
                                    foreach($all_photos as $photo) {
                                        echo"<option value=" echo $photo["id_photo"];
                                        echo $équipe["id_photo"]." ".$équipe["région"];}
                                </option>
                            </select>
                        </td>"

                        </html>
