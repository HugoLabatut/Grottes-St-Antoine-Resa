<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver - Grottes de Saint-Antoine</title>
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
        <h1>Réserver</h1>
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
                <form action="enregistrement.pages.php" method="post">
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
                            <input onclick="UI_ConfirmDateResa(event)" type="submit" value="Chosir" name="confirm_date" id="confirm_date" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section id="choixcategorie">
            <div class="col alert alert-primary">
                <form action="">
                    <?php
                    var_dump($_POST['datedebut'], $_POST['datefin'], $_POST['nbrepersonnes']);
                    $oCategories = new Categorie($con);
                    $lesCategories = $oCategories->getCategories();
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">Catégorie</th>
                                <th class="col">Description</th>
                                <th class="col">Disponibilité</th>
                                <th class="col">Tarif</th>
                                <th class="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lesCategories as $uneCategorie) {
                                echo "<tr>
                                <td>", $uneCategorie['lib_categorie'], "</td>
                                <td>", $uneCategorie['desc_categorie'], "</td>
                                <td>MEMO : Coder la disponibilité en fonction des dates de résa</td>
                                <td>MEMO : Coder les tarifs</td>
                                <td><input class='btn btn-primary' type='submit' value='Sélectionner'>";
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </section>
        <section id="formindividuel">
            <div class="col">
                <form action="../php/client.creer.php" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5>MEMO : Créer phrase du formulaire</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <label for="nom_client" class="form-label">Votre nom :</label>
                                    <input required="required" type="text" name="nom_client" id="nom_client" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="prenom_client" class="form-label">Votre prénom :</label>
                                    <input required="required" type="text" name="prenom_client" id="prenom_client" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="mail_client" class="form-label">Votre adresse mail :</label>
                                    <input required="required" type="mail" name="mail_client" id="mail_client" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="tel_client" class="form-label">Votre numéro de téléphone :</label>
                                    <input required="required" type="text" name="tel_client" id="tel_client" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="adresse_client" class="form-label">Votre adresse :</label>
                                    <input required="required" type="text" name="adresse_client" id="adresse_client" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="cp_client" class="form-label">Votre code postal :</label>
                                    <input required="required" type="text" name="cp_client" id="cp_client" onkeyup="autocomplet_commune()" class="form-control">
                                    <ul class="list-group" id="listecommunes"></ul>
                                </div>
                                <div class="col">
                                    <label for="ville_client" class="form-label">Votre ville :</label>
                                    <input required="required" type="text" name="ville_client" id="ville_client" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" value="Enregistrer">
                            <input class="btn btn-danger" type="reset" value="Effacer les champs">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>