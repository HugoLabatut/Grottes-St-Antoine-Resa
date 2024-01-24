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
    <title>Réservations - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                themeSystem: 'bootstrap5',
                height: 570,
                initialView: 'dayGridWeek',
                events: [{
                    title: 'Test',
                    start: '2024-02-01',
                    end: '2024-02-05'
                }, {
                    title: 'Test 2',
                    start: '2024-02-03',
                    end: '2024-02-04'
                }]
            });
            calendar.render();
        });
    </script>
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/resa.class.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>Réservations</h1>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
            <div class="card-footer">
                <a href="dashboard.pages.php" class="btn btn-danger">Retour</a>
            </div>
        </div>
    </div>
    <?php include("../template/footer.template.php");
    ?>
</body>

</html>