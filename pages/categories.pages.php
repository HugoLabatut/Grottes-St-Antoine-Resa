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
    <title>Catégories - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/categories.class.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>Catégories</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-lg-9">
                <form action="../php/categorie.traitement.php" method="post">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col">ID</th>
                                        <th class="col">Libellé</th>
                                        <th class="col">Description</th>
                                        <th class="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $oCategories = new Categorie($con);
                                    $lesCategories = $oCategories->getCategories();
                                    foreach ($lesCategories as $uneCategorie) {
                                        $idcat = $uneCategorie['id_categorie'];
                                        $libcat = 'libcategorie' . $idcat;
                                        $desccat = 'desccategorie' . $idcat;
                                        echo "<tr>";
                                        echo "<th scope='row'>", $uneCategorie['id_categorie'], "</th>";
                                        echo "<td><input class='form-control' type='text' name='", $libcat, "' value='", $uneCategorie['lib_categorie'], "'></td>";
                                        echo "<td><textarea class='form-control' name='", $desccat, "'>", $uneCategorie['desc_categorie'], "</textarea></td>";
                                        echo "<td><button class='btn btn-primary' name='update' value='", $uneCategorie['id_categorie'], "'
                                        type=submit'>Modifier</button>
                                        <button class='btn btn-danger' name='delete' value='", $uneCategorie['id_categorie'], "'    type=submit'>Supprimer</button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="dashboard.pages.php" class="btn btn-danger">Retour</a>
                        </div>
                    </div>
            </div>
            </form>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Créer une catégorie</h3>
                    </div>
                    <form action="../php/categorie.traitement.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="lib_categorie" class="form-label">Libellé de la catégorie : </label>
                                <input type="text" name="lib_categorie" id="lib_categorie" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc_categorie" class="form-label">Description de la catégorie : </label>
                                <textarea class="form-control" name="desc_categorie" id="desc_categorie" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Ajouter" class="btn btn-primary">
                            <input type="reset" value="Effacer les champs" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>