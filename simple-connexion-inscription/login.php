<?php
session_start();
session_destroy();
/**
 * Created by Denver's Dev.
 * User: Romario Barro
 * Date: 09/02/2022
 * Time: 16:34
 */

require("dbconnection.php");

if (isset($_POST['connexion'])){
    if (!empty($_POST['pseudo']) AND !empty($_POST['pwd'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);

        $pwd2 = sha1($_POST['pwd']);
        $requser = $bdd ->prepare("SELECT * FROM table_users WHERE pseudo = ? AND motdepasse = ?");
        $requser ->execute(array($pseudo, $pwd2));
        $userexist = $requser->rowCount();


        if($userexist == 1){
            $userinfo = $requser->fetch();
            session_start();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['name'] = $userinfo['pseudo'];

            setcookie('login', $_SESSION["name"], time() + 24*3600, null, null, false, true);
            setcookie('PHPSESSID', '', time() + - 86400, '/user/', null, false, true);
            header("Location: profile.php");

        }else{
            $erreur = "Identifiants incorrect";
        }
    }else{
        $erreur = "Veuillez remplir tous les champs";
    }
}


?>

<!Doctype html>
<html lang="fr">
    <head>
        <!-- LES METAS TAGS -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
        <!-- JS -->
        <script src="js/bootstrap.js"></script>

        <title>Page de connexion</title>
    </head>
    <body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Denver's Dev</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>


    <?php if (isset($erreur)) { ?>
        <div class="alert alert-danger d-flex align-items-center" style="margin-bottom: 0px; margin-top: 20px;" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                <?= $erreur ?>
            </div>
        </div>

    <?php } ?>
    <form action="" method="post" class=" dev-6" style="padding: 15px;">

        <div class="dev-12 dev-s-12">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" required="">
        </div>


        <div class="dev-12 dev-s-12">
            <label for="pwd" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="pwd" id="pwd" required="">
        </div>

        <div class="dev-6">
            <br>
            <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        </div>
    </form>


    </body>
</html>
