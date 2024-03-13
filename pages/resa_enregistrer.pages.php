<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver | Etape 5 - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/cp_autocomplete.js"></script>
</head>

<body>
    <?php
    include("../includes/pdo.inc.php");
    include("../template/header.template.php");
    var_dump($_POST['datedebut'], $_POST['datefin'], $_POST['prixresa']);
    ?>
    <div class="container">
        <h1>Réserver | Enregistrez votre réservation</h1>
        <div style="text-align: center;" class="alert alert-primary">
            MEMO : Créer phrase d'accueil page de réservation
        </div>
        <section id="enregistrement">
            <div class="col alert alert-primary">
                <form action="../php/resa.traitement.php" method="post">
                    <?php
                    echo '<input type="text" name="datedebut" id="datedebut" value="', $_POST['datedebut'], '" hidden="hidden">
                    <input type="text" name="datefin" id="datefin" value="', $_POST['datefin'], '" hidden="hidden">
                    <input type="text" name="prixresa" id="prixresa" value="', $_POST['prixresa'], '" hidden="hidden">';
                    ?>
                    <div class="form-group row">
                        <div class="col">
                            <label for="nom_client" class="form-label">Nom :</label>
                            <input type="text" name="nom_client" id="nom_client" class="form-control">
                        </div>
                        <div class="col">
                            <label for="prenom_client" class="form-label">Prénom :</label>
                            <input type="text" name="prenom_client" id="prenom_client" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="mail_client" class="form-label">Mail :</label>
                            <input type="email" name="mail_client" id="mail_client" class="form-control">
                        </div>
                        <div class="col">
                            <label for="tel_client" class="form-label">Téléphone :</label>
                            <input type="tel" name="tel_client" id="tel_client" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="adresse_client" class="form-label">Adresse :</label>
                            <input type="text" name="adresse_client" id="adresse_client" class="form-control">
                        </div>
                        <div class="col">
                            <label for="cp_client" class="form-label">Code postal :</label>
                            <input type="text" name="cp_client" id="cp_client" onkeyup="autocomplet_commune()" class="form-control">
                            <input type="text" hidden="hidden" id="idcommune" name="idcommune">
                            <ul class="list-group" id="listecommunes"></ul>
                        </div>
                        <div class="col">
                            <label for="ville_client" class="form-label">Ville :</label>
                            <input type="text" name="ville_client" id="ville_client" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col">
                            <input type="submit" value="Enregistrer les informations" class="btn btn-primary form-control">
                        </div>
                        <div class="col">
                            <input type="resest" value="Effacer les champs" class="btn btn-danger form-control">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>