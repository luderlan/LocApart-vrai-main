<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "locapart";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }

    if (isset($_POST['login'])) {
        $log = ($_POST['login']);
        $mdp = ($_POST['mdp']);

        $stmt = $conn->prepare("SELECT * FROM users WHERE admin_log=? AND mot_de_passe=?");
        $stmt->bindParam(1, $log);
        $stmt->bindParam(2, $mdp);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            session_start();
            $_SESSION['admin_log'] = $log;

            header("Location:../php/template/header.php");
            exit();
        } else {
            echo "<script>alert('Login ou mot de passe incorrect');</script>";
        }

        $stmt->closeCursor();
    }

    $conn = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/connecter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Handlee&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mooli:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.afrm.css">
    <title>Se Connecter</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <h2>Bienvenue !</h2>
            <br><br>
            <div class="form_area">
                <p class="title">Connexion</p>
                <form action="afrm.php" method="POST">
                    <div class="form_group">
                        <label class="sub_title" for="login">Login</label>
                        <input placeholder="Saisir le login..." name="login" id="login" class="form_style" type="text" required>
                    </div>
                    <div class="form_group">
                        <label class="sub_title" for="mdp">Mot de passe</label>
                        <input placeholder="Saisir le mot de passe..." name="mdp" id="password" class="form_style" type="password" required>
                    </div>
                    <br><br><br>
                    <div>
                        <button type="submit" class="btn">Se connecter</button>
                        <!-- <p><a class="link" href="x.php">Mot de passe oublié ? </a></p> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br> 
</body>
</html>