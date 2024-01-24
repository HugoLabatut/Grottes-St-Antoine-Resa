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
    <title>Tableau de bord - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/clients.class.php");
    include("../class/resa.class.php");
    include("../class/categories.class.php");
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Page d'administration</h1>
                <p style='text-align: justify;'>
                    Cette page permet de consulter les données du site (réservations, catégories des locations, tarifs, etc.). Elle ne doit être accessible que par le personnel. Les codes de connexion doivent donc rester confidentiels.
                </p>
                <p style='text-align: justify;' class='alert alert-danger'>
                    Vous ne devez, en aucun cas, donner/prêter vos codes de connexion à d'autres personnes. Cela peut être dangereux pour la sécurité de vos données personnelles. Veillez à ce que vos codes soient sauvegardés à l'aide d'un gestionnaire de mot de passes (Exemple : KeePass) et changés régulièrement (consulter la section 'Protection du compte' dans la page de personnalisation du compte d'administrateur).
                </p>
            </div>
            <hr>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center;">Catégories</h3>
                    </div>
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
                                    echo "<tr>";
                                    echo "<th scope='row'>", $uneCategorie['id_categorie'], "</th>";
                                    echo "<td>", $uneCategorie['lib_categorie'], "</td>";
                                    echo "<td>", $uneCategorie['desc_categorie'], "</td>";
                                    echo "<td><a href='#' class='btn btn-primary'>Modifier</a><a href='#' class='btn btn-danger'>Supprimer</a></td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center;">Tableau de bord</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $oClients = new Client($con);
                        $oResas = new Reservation($con);
                        $nombreClients = $oClients->getNombreClients();
                        $nombreResasJournee = $oResas->getNombreResaDuJour();
                        echo "Il y a <b>", $nombreClients, "</b> clients enregistrés dans la base de données.";
                        echo "<hr>";
                        echo "L'établissement affiche un total de <b>", $nombreResasJournee, "</b> réservations aujourd'hui.";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>