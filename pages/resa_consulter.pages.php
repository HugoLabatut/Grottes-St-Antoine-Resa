<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver | Etape 3 - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include("../includes/pdo.inc.php");
    include("../template/header.template.php");
    include("../class/categories.class.php");
    include("../class/photos.class.php");
    include("../class/tarifs.class.php");

    $oCategorie = new Categorie($con);
    $oPhotos = new Photo($con);
    $oTarifs = new Tarif($con);

    $lesPhotos = $oPhotos->getLienPhotoByCategorie($_POST['categorie']);

    $categorieByID = $oCategorie->getCategorieByID($_POST['categorie']);
    $laCategorie = $categorieByID->fetch(PDO::FETCH_ASSOC);

    $tarifByCategorie = $oTarifs->getTarifByCategorie($_POST['categorie']);
    $unTarif = $tarifByCategorie->fetch(PDO::FETCH_ASSOC);
    // var_dump($_POST['categorie'], $_POST['datedebut'], $_POST['datefin'], $_POST['nbrepersonnes'], $laCategorie);
    ?>
    <div class="container">
        <h1>Réserver | Consulter cette catégorie</h1>
        <div style="text-align: center;" class="alert alert-primary">
            MEMO : Créer phrase d'accueil page de réservation
        </div>
        <section id="consultationcategorie">
            <div class="col alert alert-primary">
                <form action="resa_verifier.pages.php" method="post">
                    <?php
                    // var_dump($_POST['datedebut'], $_POST['datefin'], $_POST['nbrepersonnes']);
                    echo "<h3 style='text-align: center;'><b>", $laCategorie['lib_categorie'], "</b></h3>
                    <h5>Galerie photos :</h5>";
                    foreach ($lesPhotos as $unePhoto) {
                        echo "<img src='../", $unePhoto['lien_photo'], "' class='img-thumbnail' width='250' style='margin-right: 1rem;'>";
                    }
                    ?>
                    <?php
                    echo "<h5 style='margin-top: 1rem;'>Description :</h5>
                    <p class='alert alert-light'>", $laCategorie['desc_categorie'], "</p>
                    <h4 style='margin-top: 1rem; text-align: center;'>Tarif :</h4>
                    <h2 style='text-align: center;'><b>", $unTarif['valeur_tarif'], "* €</b> par jour et par personne</h2>
                    <p><i>*Les prix peuvent varier selon les saisons</i></p>
                    <input type='text' hidden='hidden' value='", $_POST['datedebut'], "' name='datedebut'>
                    <input type='text' hidden='hidden' value='", $_POST['datefin'], "' name='datefin'>
                    <input type='text' hidden='hidden' value='", $_POST['nbrepersonnes'], "' name='nbrepersonnes'>
                    <br>
                    <div class='form-group row'><div class='col'><button class='btn btn-primary form-control' name='categorie' value='", $laCategorie['id_categorie'], "' type='submit'>Choisir cette categorie</button></div><div class='col'><button class='btn btn-danger form-control'>Retour</button></div></div>";
                    ?>
                </form>
            </div>
        </section>
    </div>
</body>

</html>