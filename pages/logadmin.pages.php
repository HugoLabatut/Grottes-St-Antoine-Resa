<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include("../template/header.template.php"); ?>
    <br>
    <div class="container">
        <h1>Administration</h1>
        <div class="alert alert-warning">
            <p>Cette page permet d'accéder à l'espace d'administration du site. Ne jamais communiquer vos informations de connexion !</p>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Se connecter en tant qu'administrateur</h2>
                </div>
                <div class="card-body">
                    <form action="../php/admin.connexion.php" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nom_admin">Nom de l'administrateur*</label>
                            <input type="text" name="nom_admin" id="nom_admin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mdp_admin">Mot de passe*</label>
                            <input type="password" name="mdp_admin" id="mdp_admin" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                        <button type="reset" class="btn btn-danger">Effacer les champs</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p>Les champs possédants une astérisque (*) sont obligatoires.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>