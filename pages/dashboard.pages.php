<?php
include("../includes/pdo.inc.php");
include("../includes/update_chambres.inc.php");
session_start();
if (!isset($_SESSION['nom_admin']) and !isset($_SESSION['mdp_admin'])) {
    echo "<script>
                alert('Vous devez être connecté pour pouvoir consulter cette page.');
                window.location.replace('../pages/logadmin.pages.php');
        </script>";
}
/*
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 5) {
    session_unset();
    session_destroy();
    echo "<script>
                alert('Vous êtes inactif depuis trop longtemps. Par sécurité, vous êtes déconnecté.');
                window.location.replace('../pages/logadmin.pages.php');
    </script>";
}

var_dump($_SESSION['nom_admin']);
$_SESSION['last_activity'] = time();
var_dump($_SESSION['last_activity']);
*/
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../includes/calender/themes/scheduler_8.css">
    <script src="../includes/calender/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    <style>
        .scheduler_8_shadow {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/clients.class.php");
    include("../class/resa.class.php");
    include("../class/categories.class.php");
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Tableau de bord</h1>
                <p style='text-align: justify;'>
                    Cette page permet de consulter les données du site (réservations, catégories des locations, tarifs, etc.). Elle ne doit être accessible que par le personnel. Les codes de connexion doivent donc rester confidentiels.
                </p>
                <p style='text-align: justify;' class='alert alert-primary'>
                    Pour la sécurité des données, ce site utilise un système de déconnexion automatique. Le délai est fixé à 3 minutes.
                </p>
                <p style='text-align: justify;' class='alert alert-danger'>
                    Vous ne devez, en aucun cas, donner/prêter vos codes de connexion à d'autres personnes. Cela peut être dangereux pour la sécurité de vos données personnelles. Veillez à ce que vos codes soient sauvegardés à l'aide d'un gestionnaire de mot de passes (Exemple : KeePass) et changés régulièrement (consulter la section 'Protection du compte' dans la page de personnalisation du compte d'administrateur).
                </p>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="col">
            <h1>Réservations</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="dp"></div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <h5>Personnaliser le nombre de jours à afficher : </h5>
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" name="nbrejours" id="nbrejours" min="5" max="30" value="7">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <h5>Date de début calendrier :</h5>
                    </div>
                    <div class="col">
                        <input type="date" name="datemin" id="datemin" class="form-control">
                    </div>
                    <div class="col">
                        <button id="modifaffichage" class="btn btn-primary" onclick="getDatesAffichage()">Consulter ces dates</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <h5>Demande de réservation d'un groupe ?</h5>
                    </div>
                    <div class="col">
                        <a href="resagroupe.pages.php" class="btn btn-primary">Créer une réservation pour un groupe</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form class="card" id="info-client" method="post">
        </form>
        <br>
    </div>
    <br>
    <?php include("../template/footer.template.php"); ?>
</body>
<script src="../js/calendrier_resa.js"></script>
<script src="../js/inactivite.js"></script>

</html>