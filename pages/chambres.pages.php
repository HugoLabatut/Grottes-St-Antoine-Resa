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
    <title>Chambres - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/cate_presta_autocomplete.js"></script>
    <script src="../js/cate_autocomplete.js"></script>
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/chambres.class.php");
    include("../class/categories.class.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>Prestations</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="../php/chambre.traitement.php" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col">ID</th>
                                        <th class="col">Libellé</th>
                                        <th class="col">Catégorie</th>
                                        <th class="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $oChambres = new Chambre($con);
                                    $oCategorie = new Categorie($con);
                                    $lesChambres = $oChambres->getChambres();
                                    foreach ($lesChambres as $uneChambre) {
                                        $idchambre = $uneChambre['id_chambre'];
                                        $libchambre = 'nouv_libelle' . $idchambre;
                                        $idcategorie = 'id_categorie' . $idchambre;
                                        echo "<tr>
                                        <th scope='row'>", $uneChambre['id_chambre'], "</th>
                                        <td><input type='text' class='form-control' name='", $libchambre, "' id='lib_chambre' value='", $uneChambre['lib_chambre'], "'></td>";
                                        $laCategorie = $oCategorie->getCategorieLibByID($uneChambre['id_categorie']);
                                        echo "<td><input onkeyup='categorie_presta_autocomplete(", $idchambre, ")' type='text' class='form-control' name='nouv_categorie' id='lib_categorie", $idchambre, "' value='", $laCategorie, "'>
                                        <ul class='list-group' id='listecategories", $idchambre, "'></ul>
                                        <input type='text' hidden='hidden' name='", $idcategorie, "' id = 'id_categorie", $idchambre, "' class='form-control'></td>
                                        <td><button class='btn btn-primary' name='update' value='", $uneChambre['id_chambre'], "' type='submit'>Modifier</button> <button class='btn btn-danger' name='delete' value='", $uneChambre['id_chambre'], "' type='submit'>Supprimer</button></td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="dashboard.pages.php" class="btn btn-danger">Retour</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Créer une prestation</h3>
                    </div>
                    <form action="../php/chambre.traitement.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="lib_chambre" class="form-label">Libellé de la prestation : </label>
                                <input type="text" name="lib_chambre" id="lib_chambre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="id_categorie" class="form-label">Catégorie : </label>
                                <input type="text" name="lib_categorie" id="lib_categorie" onkeyup="categorie_autocomplete()" class="form-control">
                                <ul class="list-group" id="listecategories"></ul>
                                <input type="text" hidden="hidden" name="id_categorie" id="id_categorie" class="form-control">
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
<script src="../js/inactivite.js"></script>

</html>