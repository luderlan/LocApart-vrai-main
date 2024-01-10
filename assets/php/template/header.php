<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.header.css">
    <title></title>
</head>
<body>
    <header>
        <img class="logo" src="../../../logo-site/logo-finis.png" alt="">

        <ul class="navbar">
            <li><a href="../../../interface/accueil.php"><i class="fa-solid fa-house" style="color: #1b5eaf;"></i> Accueil</a></li>
            <li><a href="../../../interface/biens.php"><i class="fa-solid fa-thumbtack" style="color: #1b5eaf;"></i> Nos biens</a></li>
            <li><a href="../../../interface/contact.html"><i class="fa-solid fa-address-book" style="color: #1b5eaf;" ></i> Contact</a></li>
        </ul>

        <div class="navbar">
            <a href="../../../interface/connecter.php" class="user"><i class="fa-regular fa-user" style="color: #1b5eaf;"></i> Se Connecter</a>
            <a href="../../../interface/inscrire.html"><i class="fa-regular fa-address-card" style="color: #1b5eaf;"></i> S'inscrire</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <div class="section-admin">
        <h2>Connecté en tant qu'administrateur</h2>
        <br>
        <h4>Dirigez-vous vers la page de gestion de votre choix :</h4>
        <br>
        <br>
        <a href="../affichage/aff.client.php" class="button">Clients</a>
        <a href="../affichage/bien/bien.aff.php" class="button">Biens</a>
        <a href="../affichage/aff.reservation.php" class="button">Réservation</a>
        <a href="../affichage/aff.type_bien.php" class="button">Type bien</a>
    </div>
</body>
</html> 