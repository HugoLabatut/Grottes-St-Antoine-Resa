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
</head>

<body>
    <?php include("../template/header.template.php"); ?>
    <br>
    <div class="container">
        <h1>Réserver</h1>
        <div class="col">
            <form action="../php/client.creer.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h5>Pour commencer, remplissez ce formulaire.</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col">
                                <label for="nom_client" class="form-label">Votre nom :</label>
                                <input type="text" name="nom_client" id="nom_client" class="form-control">
                            </div>
                            <div class="col">
                                <label for="prenom_client" class="form-label">Votre prénom :</label>
                                <input type="text" name="prenom_client" id="prenom_client" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="raison_sociale_client" class="form-label">Votre raison sociale :</label>
                                <input type="text" name="raison_sociale_client" id="raison_sociale_client" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="mail_client" class="form-label">Votre adresse mail :</label>
                                <input type="mail" name="mail_client" id="mail_client" class="form-control">
                            </div>
                            <div class="col">
                                <label for="tel_client" class="form-label">Votre numéro de téléphone :</label>
                                <input type="text" name="tel_client" id="tel_client" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="adresse_client" class="form-label">Votre adresse :</label>
                                <input type="text" name="adresse_client" id="adresse_client" class="form-control">
                            </div>
                            <div class="col">
                                <label for="cp_client" class="form-label">Votre code postal :</label>
                                <input type="text" name="cp_client" id="cp_client" onkeyup="autocomplet_commune()" class="form-control">
                                <ul class="list-group" id="listecommunes"></ul>
                            </div>
                            <div class="col">
                                <label for="ville_client" class="form-label">Votre ville :</label>
                                <input type="text" name="ville_client" id="ville_client" class="form-control">
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
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>