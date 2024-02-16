<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver | Etape 1 - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/cp_autocomplete.js"></script>
    <script src="../js/enregistrement_events.js"></script>
</head>

<body>
    <?php
    include("../includes/pdo.inc.php");
    include("../template/header.template.php");
    include("../class/categories.class.php");
    ?>
    <div class="container">
        <h1>Réserver | Première étape</h1>
        <div style="text-align: center;" class="alert alert-primary">
            MEMO : Créer phrase d'accueil page de réservation
        </div>
        <section id="choixclientele">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="text-align: center;">Vous êtes un individuel.</h3>
                            <br>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" id="select_individuel" onclick="UI_SelectIndividuelClicked()" class="btn btn-primary">Choisir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="text-align: center;">Vous êtes un groupe.</h3>
                            <br>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" id="select_groupe" onclick="UI_SelectGroupeClicked()" class="btn btn-primary">Choisir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section id="infogroupe">
            <div class="col alert alert-info">
                MEMO : Créer phrase de contact groupe
            </div>
        </section>
        <section id="choixdate">
            <div class="col alert alert-info">
                <form action="resa_categories.pages.php" method="post">
                    <div class="form-group row">
                        <div class="col">
                            <label for="datedebut" class="form-label">Date d'arrivé :</label>
                            <input type="date" name="datedebut" id="datedebut" class="form-control">
                        </div>
                        <div class="col">
                            <label for="datefin" class="form-label">Date de départ :</label>
                            <input type="date" name="datefin" id="datefin" class="form-control">
                        </div>
                        <div class="col">
                            <label for="nbrepersonnes" class="form-label">Nombre de personnes (?) :</label>
                            <input type="number" name="nbrepersonnes" id="nbrepersonnes" min="1" class="form-control">
                        </div>
                        <div class="col">
                            <label for="action" class="form-label">Action :</label>
                            <input type="submit" value="Choisir" name="confirm_date" id="confirm_date" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <hr>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>