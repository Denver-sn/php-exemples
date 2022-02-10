<?php
/**
 * Created by Denver's Dev.
 * User: Romario Barro
 * Date: 09/02/2022
 * Time: 15:30
 */

require("dbconnection.php");

if (isset($_POST['inscription']))
{
    if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['pwd'])){
        // récuperer les identifiants saisis par l"utilisateur:
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);

        // vérifier si le mail est déjà pris:
        $query_mail = $bdd->prepare("SELECT * FROM table_users WHERE email = ?");
        $query_mail->execute(array($email));

        $email_count = $query_mail->rowCount();
        if ($email_count == 0){
            // vérifier si le Pseudo est déjà pris:
            $query_pseudo = $bdd->prepare("SELECT * FROM table_users WHERE pseudo = ?");
            $query_pseudo->execute(array($pseudo));

            $pseudo_count = $query_pseudo->rowCount();
            if ($pseudo_count == 0){
                // Crypter le mot de passe de l'utilisateur
                $pwd2 = sha1($pwd);

                // Insérer les identifiants de l'utilisateur
                $inserttMembre = $bdd->prepare("INSERT INTO table_users (pseudo, email, motdepasse) VALUES(?, ?, ?)");
                $inserttMembre->execute(array($pseudo, $email, $pwd2));

                $message = "Inscription réussis";
            }else{
                $erreur = "Ce pseudo est déjà pris";
            }
        }else{
            $erreur = "Ce mail est déjà pris";
        }
    }else{
        $erreur = "Veuillez remplir tous les champs !";
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

        <title>Page d'inscription</title>
    </head>
    <body>

    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Denver's Dev</a>
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

    <?php
    if (isset($message)) { ?>
        <div class="alert alert-success d-flex align-items-center" style="margin-bottom: 0px; margin-top: 10px;" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                <?= $message ?>
            </div>
        </div>
    <?php }elseif (isset($erreur)) { ?>
    <div class="alert alert-danger d-flex align-items-center" style="margin-bottom: 0px; margin-top: 10px;" role="alert">
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
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required="">
        </div>

        <div class="dev-12 dev-s-12">
            <label for="pwd" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="pwd" id="pwd" required="">
        </div>

        <div class="dev-6">
            <br>
            <button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>


    </body>
</html>
