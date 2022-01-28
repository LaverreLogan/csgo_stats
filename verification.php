<?php
include("connect.php");
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['psw1']) && !empty($_POST['psw1']))
        && (isset($_POST['psw2']) && !empty($_POST['psw2']))
    ) {
        if ($_POST['psw1'] != $_POST['psw2']) {
            $erreur = 'Les 2 password sont differents.';
            echo $erreur;
            echo "<br/><a href=\"index.php.php\">Accueil</a>";
            exit();
        } else {
            $connexion = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
            if (!$connexion) {
                echo "La connexion au serveur MYSQL a échoué";
                exit();
            }
            print "Connexion à la base de donnée réussie";
            $sql = 'SELECT count(*) FROM joueur WHERE pseudo="' . mysqli_real_escape_string($connexion, $_POST['login']) . '"';
            $req = mysqli_query($connexion, $sql) or die('Erreur SQL<br/>' . $sql . '<br/>' . mysqli_error($connexion));
            $data = mysqli_fetch_array($req);
            if ($data[0] == 0) {
                $sql = 'INSERT INTO joueur VALUES(NULL,"' . mysqli_escape_string($connexion, $_POST['login']) . '", "' . mysqli_escape_string($connexion, md5($_POST['psw1'])) . '")';
                mysqli_query($connexion, $sql) or die('Erreur SQL<br/>' . $sql . '<br/>' . mysqli_error($connexion));
                echo 'Inscription réussie';
                echo '<br/><a href="index.php">Accueil</a>';
                exit();
            } else {
                echo 'Login déjà utilisé';
                echo '<br/><a href="index.php">Accueil</a>';
            }
        }
    } else {
        echo 'Au moins un des champs est vide !';
        echo '<br/><a href="index.php">Accueil</a>';
        exit();
    }
};
if (isset($_POST['valider']) && $_POST['valider'] == 'Valider') {
    if ((isset($_POST['score_CT']) && !empty($_POST['score_CT'])) && (isset($_POST['score_T']) && !empty($_POST['score_T'])) && (isset($_POST['kills']) && !empty($_POST['kills'])) && (isset($_POST['deaths']) && !empty($_POST['deaths'])) && (isset($_POST['assists']) && !empty($_POST['assists']))) {
        $connexion = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
        if (!$connexion) {
            echo "Connexion échouée";
            exit();
        } else {
            $req_partie = 'INSERT INTO partie VALUES(NULL, "' . $_POST['score_CT'] . '","' . $_POST['score_T'] . '","' . $_POST['Victory'] . '")';
            $req_SJ = 'INSERT INTO score_joueur VALUES(NULL, NULL, "' . $_POST['kills'] . '","' . $_POST['deaths'] . '","' . $_POST['assists'] . '")';
            mysqli_query($connexion, $req_partie);
            mysqli_query($connexion, $req_SJ);
            header('Location: espace_membre.php');
            echo "Connexion réussie";
        }
    }
}
