<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver | Etape 4 - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function backToCategories() {
            window.location.href("resa_categories.pages.php");
        }
    </script>
</head>

<body>
    <?php
    include("../includes/pdo.inc.php");
    include("../template/header.template.php");
    include("../class/categories.class.php");
    include("../class/tarifs.class.php");
    include("../class/bar.class.php");

    $oCategorie = new Categorie($con);
    $oTarifs = new Tarif($con);
    $oBAR = new BAR($con);

    $categorieByID = $oCategorie->getCategorieByID($_POST['categorie']);
    $laCategorie = $categorieByID->fetch(PDO::FETCH_ASSOC);

    $tarifByCategorie = $oTarifs->getTarifByCategorie($_POST['categorie']);
    $unTarif = $tarifByCategorie->fetch(PDO::FETCH_ASSOC);

    $BARByID = $oBAR->getBARByID($unTarif['id_bar']);
    $uneBAR = $BARByID->fetch(PDO::FETCH_ASSOC);

    $datedebut = strtotime($_POST['datedebut']);
    $datefin = strtotime($_POST['datefin']);

    $prixresaparjour_decimal = $unTarif['valeur_tarif'] * $uneBAR['pourcentage_bar'];

    $prixresaparjour = round($prixresaparjour_decimal, 2);

    $nbrejoursTimestamp = $datefin - $datedebut;

    $nbrejours = $nbrejoursTimestamp / 86400;

    $prixresatotal = $prixresaparjour * $nbrejours;

    // var_dump($nbrejours);

    // var_dump($_POST['datedebut'], $_POST['datefin'], $_POST['nbrepersonnes'], $laCategorie);
    ?>
    <div class="container">
        <h1>Réserver | Vérifiez vos informations</h1>
        <div style="text-align: center;" class="alert alert-primary">
            MEMO : Créer phrase d'accueil page de réservation
        </div>
        <section id="verifresa">
            <div class="col alert alert-primary">
                <form action="resa_enregistrer.pages.php" method="post">
                    <?php
                    echo "<div class='form-group row'>
                    <h4>Rappel de vos dates et du nombre de personnes : </h4>
                    <div class='col'>
                    <label class='form-label' for='datedebut'>Date d'arrivée :</label>
                    <input class='form-control' type='date' value='", $_POST['datedebut'], "'>
                    <input type='text' name='datedebut' value='", $_POST['datedebut'], "' hidden='hidden'>
                    </div>
                    <div class='col'>
                    <label class='form-label' for='datedebut'>Date de départ :</label>
                    <input class='form-control' type='date' value='", $_POST['datefin'], "'>
                    <input type='text' name='datefin' value='", $_POST['datefin'], "' hidden='hidden'>
                    </div>
                    <div class='col'>
                    <label class='form-label' for='nbrepersonnes'>Nombre de personnes :</label>
                    <input class='form-control' type='number' min='1' value='", $_POST['nbrepersonnes'], "'>
                    </div>
                    <!--
                    <div class='col'>
                    <label class='form-label' for='changer'>Vous avez modifier quelque chose ?</label>
                    <button name='backToCategories' class='btn btn-primary form-control'>Modifier les informations</button>
                    </div>
                    -->
                    </div>
                    <hr>
                    <div class='form-group row'>
                    <h4>Rappel de vos choix : </h4>
                    <div class='col'>
                    <label class='form-label' for='libcategorie'>Catégorie choisie :</label>
                    <p class='form-control'>", $laCategorie['lib_categorie'], "</p>
                    </div>
                    <div class='col'>
                    <label class='form-label' for='datedebut'>Tarif par jour et par personne :</label>
                    <p class='form-control'>", $unTarif['valeur_tarif'], " €</p>
                    </div>
                    <!--
                    <div class='col'>
                    <label class='form-label' for='changer'>Ce choix ne vous convient pas ?</label>
                    <button name='backToCategories' class='btn btn-primary form-control'>Changer la catégorie</button>
                    </div>
                    -->
                    </div>
                    <hr>
                    <div class='form-group row'>
                    <div class='col'>
                    <h4 style='text-align: center;'>Montant dû : </h4>
                    <h5 style='text-align: center;'><b>", $prixresaparjour, " € </b>par jour pour ", $_POST['nbrepersonnes'], " personnes, soit</h5>
                    <h2 style='text-align: center;'><b>", $prixresatotal, " € </b>pour ", $nbrejours, " jours.</h2>
                    <input type='text' name='prixresa' value='", $prixresatotal, "' hidden='hidden'>
                    <br>
                    </div>
                    </div>
                    <div class='form-group row'>
                    <div class='col'>
                    <button class='btn btn-primary form-control' name='categorie' value='", $laCategorie['id_categorie'], "' type='submit'>Valider mes choix</button>
                    </div>
                    <div class='col'>
                    <button class='btn btn-danger form-control'>Retour au début</button>
                    </div>";
                    ?>
                </form>
            </div>
        </section>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>