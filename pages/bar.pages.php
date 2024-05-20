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
    <title>BAR - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/bar.class.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>BAR</h1>
            <p style="text-align: justify;">
                Fixer les BAR (Best Available Rate) par période pour que les tarifs puissent s'adapter en fonction des saisons.
            </p>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="../php/bar.traitement.php" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class='col'>ID</th>
                                        <th class='col'>Libellé</th>
                                        <th class='col'>Date début</th>
                                        <th class='col'>Date fin</th>
                                        <th class='col'>Pourcentage</th>
                                        <th class="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $oBAR = new BAR($con);
                                    $lesBAR = $oBAR->getBAR();
                                    foreach ($lesBAR as $uneBAR) {
                                        echo "<tr>
                                        <th scope='row'>", $uneBAR['id_bar'], "</th>
                                        <td>", $uneBAR['lib_bar'], "</td>
                                        <td>", $uneBAR['date_debut_bar'], "</td>
                                        <td>", $uneBAR['date_fin_bar'], "</td>
                                        <td>", $uneBAR['pourcentage_bar'], "</td>
                                        <td><button class='btn btn-primary' name='gounebar' value='", $uneBAR['id_bar'], "' type='submit'>Modifier</button> <button class='btn btn-danger' name='delete' value='", $uneBAR['id_bar'], "' type='submit'>Supprimer</button></td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <form action="../php/bar.traitement.php" method="post">
                        <div class="card-header">
                            <h5>Créer une BAR</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="libbar" class="form-label">Libellé BAR :</label>
                                <input type="text" name="libbar" id="libbar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ddebbar" class="form-label">Date début BAR :</label>
                                <input type="date" name="ddebbar" id="ddebbar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dfinbar" class="form-label">Date fin BAR :</label>
                                <input type="date" name="dfinbar" id="dfinbar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pctbar" class="form-label">Pourcentage :</label>
                                <input type="text" name="pctbar" id="pctbar" class="form-control">
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
    <?php include("../template/footer.template.php"); ?>
</body>

</html>