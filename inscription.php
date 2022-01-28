<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>Inscription à l'espace membre: </h2>

        <form action="verification.php" method="POST">
            <input type="text" name="login" placeholder="Login"></br>
            <input type="password" name="psw1" placeholder="Mot de passe"></br>
            <input type="password" name="psw2" placeholder="Confirmer mot de passe"></br>
            <input type="submit" name="inscription" value="Inscription">

        </form>
    </div>
</body>

</html>