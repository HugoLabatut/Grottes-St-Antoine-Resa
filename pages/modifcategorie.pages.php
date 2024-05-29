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
    <title>Modifier une catégorie - Grottes de St Antoine</title>
    <style>
        .img-thumbnail {
            cursor: pointer;
        }

        .selected {
            border: 3px solid blue;
        }
    </style>
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/categories.class.php");
    include("../class/photos.class.php");
    include("../class/tarifs.class.php");
    include("../class/bar.class.php");
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
                    <form action="../php/categorie.modif.php" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <?php
                            $oCategorie = new Categorie($con);
                            $oPhotos = new Photo($con);
                            $oTarifs = new Tarif($con);
                            $oBar = new BAR($con);
                            $lesCategories = $oCategorie->getCategories();
                            $lesPhotos = $oPhotos->getPhotos();
                            $idCategorie = $_GET['idCategorie'];
                            $lesTarifs = $oTarifs->getTarifByCategorie($idCategorie);
                            $lesBAR = $oBar->getBAR();
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
                                    <label class='form-label' for='photo'>Photo sélectionnée :</label><br>
                                    <img id='large-image' class='img-thumbnail' src='../res/img/noimage_selected.png' alt='Cliquez sur une miniature pour afficher la photo en grand' class='img-fluid' style='width: 800px;'><br>
                                    <label class='form-label' for='photos'>Photos :</label><br>";
                                    foreach ($lesPhotos as $unePhoto) {
                                        // var_dump($unePhoto);
                                        if ($unePhoto['id_categorie'] == $idCategorie) {
                                            echo "<img src='../", $unePhoto['lien_photo'], "' id='miniatures' class='img-thumbnail' onclick='displayLargePhoto(\"../", $unePhoto['lien_photo'],"\"); displaySelectedPhoto();' width='250' style='margin-right: 1rem;' data-id='", $unePhoto['id_photo'],"'>";
                                        } elseif ($unePhoto['id_categorie'] == NULL) {
                                            echo "<div class='alert alert-primary'>Aucune photo pour cette catégorie.</div>";
                                        }
                                    }
                                    echo "</div><br>";

                                    echo "<div class='form-group'>
                                        <label class='form-label' for='ajoutphoto'>Ajout d'une photo :</label>
                                        <input type='file' accept='.png, .jpg, .jpeg' name='photocategorie' id='photocategorie' class='form-control'><br>
                                        <button type='submit' name='update_photo' value='", $uneCategorie['id_categorie'], "' class='btn btn-primary btn-sm' style='margin-right: 1rem;'>Ajouter une photo</button>
                                    </div>
                                    <br>";

                                    echo "<h3>Tableau des tarifs :</h3>
                                    
                                    <div class='form-group'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th class='col'>Valeur (en €)</th>
                                                    <th class='col'>BAR</th>
                                                    <th class='col'>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                    foreach ($lesTarifs as $unTarif) {
                                        if ($unTarif['id_categorie'] == $idCategorie) {
                                            $idt = $unTarif['id_tarif'];
                                            $val = 'new_tarif' . $idt;
                                            $bar = 'new_bar' . $idt;
                                            echo "<tr>
                                                <td><input type='text' style='width: 100px;' class='form-control' name='", $val, "' value='", $unTarif['valeur_tarif'], "'></td>";
                                            foreach ($lesBAR as $uneBAR) {
                                                if ($unTarif['id_bar'] == $uneBAR['id_bar']) {
                                                    $pctbar_nondecimal = $uneBAR['pourcentage_bar'] * 100;
                                                    echo "<td>
                                                    <input type='text' class='form-control' onkeyup='bar_autocomplete()' id='lib_bar' name='", $bar, "' value='", $uneBAR['lib_bar'], "'>
                                                    <input class='form-control' hidden='hidden' type='text' id='id_bar' name='", $bar, "'>
                                                    <ul class='list-group' id='listebar'></ul>
                                                    </td>";
                                                }
                                            }
                                            echo "<td><button type='submit' name='update_tarif' value='", $unTarif['id_tarif'], "' class='btn btn-primary' style='margin-right: 1rem;'>Modifier le tarif</button><button type='submit' name='delete_tarif' value='", $uneCategorie['id_categorie'], "' class='btn btn-danger'>Supprimer ce tarif</button></td>
                                            </tr>";
                                        } else {
                                            echo "<tr><td><p>Aucune donnée.</p></td></tr>";
                                        }
                                    }

                                    echo "</tbody>
                                        </table>
                                    </div>
                                    <div class='alert alert-primary'>
                                    <h5>Créer un nouveau tarif :</h5>
                                    <div class='form-group row'>
                                        <div class='col'>
                                            <label for='valeurtarif'>Valeur du tarif <b>(en €)</b> :</label>
                                            <input type='text' class='form-control' name='valeurtarif'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <div class='col'>
                                            <label for='bar'>BAR :</label>
                                            <input class='form-control' type='text' onkeyup='bar_autocomplete()' id='lib_bar' name='lib_bar'>
                                            <input class='form-control' hidden='hidden' type='text' id='id_bar' name='id_bar'>
                                            <ul class='list-group' id='listebar'></ul>
                                        </div>
                                    </div>
                                <br>
                                <button type='submit' value='", $uneCategorie['id_categorie'], "' name='create_tarif' class='btn btn-primary btn-sm' style='margin-right: 1rem;'>Créer un tarif</button><button type='reset' class='btn btn-danger btn-sm'>Effacer les champs</button>
                                </div>";
                            ?>
                        </div>
                        <div class="card-footer">
                        <?php
                                    echo "<button type='submit' name='update' value='", $uneCategorie['id_categorie'], "' class='btn btn-primary' style='margin-right: 1rem;'>Sauvegarder</button>";
                                }
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bar_autocomplete.js"></script>
    <script src="../js/photo_large.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>