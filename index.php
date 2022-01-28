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
    <div class="formContainer">
        <p>Connexion à l'espace membre: </br></p>
        <form action="connexion.php" method="post" class="form">
            <label for="login">Login: </label><input type="text" name="login" /></br>
            <label for="password">Password: </label><input type="password" name="password" /></br>
            <input type="submit" name="connexion" value="Connexion" class="button">
        </form>
        <a href="inscription.php">S'inscrire</a>
    </div>
</body>

</html>