<?php
session_start();

if (empty($_SESSION['name']))
{
    header("Location: login.php");

}
/**
 * Created by Denver's Dev.
 * User: Romario Barro
 * Date: 09/02/2022
 * Time: 15:30
 */

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

        <title>Profile</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Denver's Dev</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="logout.php">Deconnexion</a>
                    </li>
                </ul>

            </div>
        </div>



    </nav>
    <!-- Button trigger modal -->
    <button type="button" style="margin-top: 20px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cliquer ici
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message de Bienvenue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   Bienvenue <?= $_SESSION['name']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                </div>
            </div>
        </div>
    </div>

    </body>
</html>
