<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver | Etape 2 - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
</head>

<body>
    <?php
    include("../includes/pdo.inc.php");
    include("../template/header.template.php");
    include("../class/categories.class.php");
    include("../class/tarifs.class.php");
    ?>
    <div class="container">
        <h1>Réserver | Choisir une catégorie</h1>
        <div style="text-align: center;" class="alert alert-primary">
            MEMO : Créer phrase d'accueil page de réservation
        </div>
        <section id="choixcategorie">
            <div class="col alert alert-primary">
                <?php
                var_dump($_POST['datedebut'], $_POST['datefin'], $_POST['nbrepersonnes']);
                $oCategories = new Categorie($con);
                $oTarifs = new Tarif($con);
                $lesCategories = $oCategories->getCategories();
                ?>
                <form action="resa_consulter.pages.php" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">Catégorie</th>
                                <th class="col">Description</th>
                                <th class="col">Tarif</th>
                                <th class="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lesCategories as $uneCategorie) {
                                $idc = $uneCategorie['id_categorie'];
                                $tarifByCategorie = $oTarifs->getTarifByCategorie($uneCategorie['id_categorie']);
                                $unTarif = $tarifByCategorie->fetch(PDO::FETCH_ASSOC);
                                echo "<tr>
                                <td>", $uneCategorie['lib_categorie'], "</td>
                                <td>", $uneCategorie['desc_categorie'], "</td>
                                <td>", $unTarif['valeur_tarif']," €</td>
                                <td hidden='hidden'><input type='text' hidden='hidden' value='", $_POST['datedebut'], "' name='datedebut'></td>
                                <td hidden='hidden'><input type='text' hidden='hidden' value='", $_POST['datefin'], "' name='datefin'></td>
                                <td hidden='hidden'><input type='text' hidden='hidden' value='", $_POST['nbrepersonnes'], "' name='nbrepersonnes'></td>
                                <td><button class='btn btn-primary' name='categorie' value='", $uneCategorie['id_categorie'], "' type='submit'>Sélectionner</button></td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </section>
    </div>
</body>

</html>