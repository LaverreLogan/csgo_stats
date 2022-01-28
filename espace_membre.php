<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSGO Stats</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <header>
        <img id="imageHeader" src="./Assets/img/header2.jpeg" alt="Image_Header" />
        <div id="titleHeader">
            <a href="index.php">CSGO Stats</a>
        </div>
    </header>
    <div id="menu">
        <p>Trier par:</p>
        <a href="">Parties</a>
        <a href="">Joueurs</a>
        <a href="">Classement</a>
        <a href="">Tout afficher</a>
    </div>
    <div class="formContainer">
        <h2>Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?></h2>
        <a href="deconnexion.php">Se déconnecter</a>
        <form action="verification.php" method="POST" class="form">
            <label for="">Score CT: </label><input type="text" name="score_CT">
            <label for="">Score T: </label><input type="text" name="score_T">
            <label for="">Kills</label><input type="number" name="kills">
            <label for="">Deaths</label><input type="number" name="deaths">
            <label for="">Assists</label><input type="number" name="assists">
            <div class="result">
                <div>
                    <p>Résultat partie: </p>
                    <input type="checkbox" name="Victory"><label for="Victory">Victoire</label>
                </div>
            </div>
            <input type="submit" value="Valider" class="button" name="valider">
        </form>
    </div>
</body>

</html>