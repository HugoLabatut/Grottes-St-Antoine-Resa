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
    <title>Réservation groupe - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>Réserver pour un groupe</h1>
            <p style="text-align: justify;">
                Réaliser une réservation pour un groupe via l'espace d'administration.
            </p>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="card">
            <form action="../php/resagroupe.traitement.php" method="post" class="card-body">
                <h4>Informations du client :</h4>
                <div class="row form-group">
                    <div class="col">
                        <label for="nom_client" class="form-label">Nom du client :</label>
                        <input type="text" name="nom_client" id="nom_client" class="form-control">
                    </div>
                    <div class="col">
                        <label for="prenom_client" class="form-label">Prénom du client :</label>
                        <input type="text" name="prenom_client" id="prenom_client" class="form-control">
                    </div>
                    <div class="col">
                        <label for="raison_sociale_client" class="form-label">Raison sociale :</label>
                        <input type="text" name="raison_sociale_client" id="raison_sociale_client" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col">
                        <label for="mail_client" class="form-label">Adresse mail :</label>
                        <input type="text" name="mail_client" id="mail_client" class="form-control">
                    </div>
                    <div class="col">
                        <label for="tel_client" class="form-label">Téléphone :</label>
                        <input type="text" name="tel_client" id="tel_client" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row form-group">
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
                <hr>
                <h4>Informations de réservation :</h4>
                <div class="row form-group">
                    <div class="col">
                        <label for="date_debut_resa" class="form-label">Date d'arrivée :</label>
                        <input type="date" name="date_debut_resa" id="date_debut_resa" class="form-control">
                    </div>
                    <div class="col">
                        <label for="date_fin_resa" class="form-label">Date de fin :</label>
                        <input type="date" name="date_fin_resa" id="date_fin_resa" class="form-control">
                    </div>
                    <div class="col">
                        <label for="nbre_personnes" class="form-label">Nombre de personne :</label>
                        <input type="number" class="form-control" min="1" name="nbre_personnes" id="nbre_personnes">
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col">
                        <label for="lib_categorie" class="form-label">Catégorie :</label>
                        <input type="text" name="lib_categorie" id="lib_categorie" onkeyup="categorie_autocomplete()" class="form-control">
                        <ul class="list-group" id="listecategories"></ul>
                        <input type="text" hidden="hidden" name="id_categorie" id="id_categorie" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col">
                        <input type="submit" value="Enregistrer la réservation" class="form-control btn btn-primary">
                    </div>
                    <div class="col">
                        <input type="reset" value="Effacer tous les champs" class="form-control btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <?php include("../template/footer.template.php"); ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/cate_autocomplete.js"></script>
    <script src="../js/cp_autocomplete.js"></script>
    <script src="../js/inactivite.js"></script>
</body>

</html>