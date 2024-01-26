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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Modifier une catégorie - Grottes de Saint-Antoine</title>
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/categories.class.php");
    include("../class/photos.class.php");
    include("../class/tarifs.class.php");
    if ($_GET['idCategorie'] == NULL) {
        echo "<script>
                alert('Vous devez choisir une catégorie à modifier pour pouvoir accéder à cette page.');
                window.location.replace('../pages/categories.pages.php');
        </script>";
    }
    ?>
    <div class="container">
        <div class="col">
            <?php echo "<h1>Modifier la catégorie n°", $_GET['idCategorie'], "</h1>" ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="../php/categorie.traitement.php" method="post">
                            <?php
                            $oCategorie = new Categorie($con);
                            $oPhotos = new Photo($con);
                            $oTarifs = new Tarif($con);
                            $lesCategories = $oCategorie->getCategories();
                            $lesPhotos = $oPhotos->getPhotos();
                            $idCategorie = $_GET['idCategorie'];
                            if ($idCategorie == NULL) {
                                echo "<h3>Aucune donnée selectionnée.</h3>";
                            }
                            foreach ($lesCategories as $uneCategorie) {
                                if ($uneCategorie['id_categorie'] == $idCategorie) {
                                    echo "<div class='form-group'>
                                        <label class='form-label' for='libcategorie'>Libellé de la catégorie :</label>
                                        <input class='form-control' id='libcategorie' name='libcategorie' type='text' value='", $uneCategorie['lib_categorie'], "'>
                                    </div>";

                                    echo "<div class='form-group'>
                                        <label class='form-label' for='desccategorie'>Description de la catégorie :</label>
                                        <textarea class='form-control' id='desccategorie' name='desccategorie'>", $uneCategorie['desc_categorie'], "</textarea>
                                    </div>";

                                    echo "<div class='form-group'>
                                    <label class='form-label' for='photos'>Photos :</label>";
                                    foreach ($lesPhotos as $unePhoto) {
                                        var_dump($unePhoto);
                                        if ($unePhoto['id_categorie'] == $idCategorie) {
                                            echo "<img src'../", $unePhoto['lien_photo'], "' width='150'>";
                                        } else {
                                            echo "Aucune photo pour cette catégorie.";
                                        }
                                    }
                                    echo "</div>";

                                    echo "<div class='form-group'>
                                        <label class='form-label' for='ajoutphoto'>Ajout d'une photo :</label>
                                        <input type='file' accept='.png, .jpg, .jpeg' name='photocategorie' id='photocategorie'     class='form-control'><br>
                                        <button type='submit' name='update_photo' value='", $uneCategorie['id_categorie'], "' class='btn btn-primary    btn-sm'>Ajouter une photo</button>
                                    </div>
                                    <br>";

                                    $leTarif = $oTarifs->getTarifByCategorie($idCategorie);

                                    echo "<h3>Tableau des tarifs :</h3>";

                                    if ($leTarif['id_tarif'] == NULL) {
                                        echo "<div class='form-group'>
                                        <h5>Aucun tarif n'a été associé pour le moment.</h5>
                                        </div>";
                                    } else {
                                        echo "<div class='form-group'>
                                            <table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th class='col'>ID</th>
                                                        <th class='col'>Libellé</th>
                                                        <th class='col'>Date de début</th>
                                                        <th class='col'>Date de fin</th>
                                                        <th class='col'>Valeur</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope='row'>", $leTarif['id_tarif'], "</th>
                                                        <td>", $leTarif['lib_saisonnalité'], "</td>
                                                        <td>", $leTarif['date_deb_saisonnalité'], "</td>
                                                        <td>", $leTarif['date_fin_saisonnalité'], "</td>
                                                        <td>", $leTarif['valeur_tarif'], " €</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>";
                                    }
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>