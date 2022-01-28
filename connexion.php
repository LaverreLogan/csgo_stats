<?php
include("connect.php");
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $connexion = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
        if (!$connexion) {
            die('Connexion failed: ' . mysqli_error($connexion));
        }
        echo "Connected successfully";
    }
    $sql = 'SELECT count(*) FROM joueur WHERE pseudo="' . mysqli_real_escape_string($connexion, $_POST['login']) . '" AND password="' . mysqli_real_escape_string($connexion, md5($_POST['password'])) . '"';
    $req = mysqli_query($connexion, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($connexion));
    $data = mysqli_fetch_array($req);
    if ($data[0] == 1) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        header('Location: espace_membre.php');
        exit();
    } elseif ($data[0] == 0) {
        $erreur = 'Login ou mot de passe incorrect !';
        echo $erreur;
        echo "</br><a href=\"index.php\">Accueil</a>";
        exit();
    } else {
        $erreur = 'Problème dans la base de donnée';
        echo $erreur;
        echo "<br/><a href=\"index.php\">Accueil</a>";
        exit();
    }
} else {
    $erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide !';
    echo $erreur;
    echo "<br/><a href=\"index.php\">Accueil</a>";
    exit();
}
