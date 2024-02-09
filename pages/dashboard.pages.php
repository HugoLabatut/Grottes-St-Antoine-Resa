<?php
include("../includes/pdo.inc.php");
session_start();
if (!isset($_SESSION['nom_admin']) and !isset($_SESSION['mdp_admin'])) {
    echo "<script>
                alert('Vous devez être connecté pour pouvoir consulter cette page.');
                window.location.replace('../pages/logadmin.pages.php');
        </script>";
}
// var_dump($_SESSION['nom_admin']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                themeSystem: 'bootstrap5',
                height: 570,
                initialView: 'dayGridWeek',
                firstDay: 1,
                events: [{
                    title: 'Test',
                    start: '2024-02-06',
                    end: '2024-02-08'
                }, {
                    title: 'Test 2',
                    start: '2024-02-05',
                    end: '2024-02-10'
                }]
            });
            calendar.render();
        });
    </script>
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
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <br>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>