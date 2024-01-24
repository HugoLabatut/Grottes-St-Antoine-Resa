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
    <title>Clientèle - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/clients.class.php");
    ?>
    <br>
    <div class="container">
        <div class="col">
            <h1>Clientèle</h1>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col">ID</th>
                            <th class="col">Nom</th>
                            <th class="col">Prénom</th>
                            <th class="col">Mail</th>
                            <th class="col">Téléphone</th>
                            <th class="col">Adresse</th>
                            <th class="col">Code postal</th>
                            <th class="col">Ville</th>
                            <th class="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oClients = new Client($con);
                        $lesClients = $oClients->getClients();
                        foreach ($lesClients as $unClient) {
                            if ($unClient['id_client'] == NULL) {
                                echo "Aucun client dans la base de données.";
                            } else {
                                echo "<tr>";
                                echo "<th scope='row'>", $unClient['id_client'], "</th>";
                                echo "<td>", $unClient['nom_client'], "</td>";
                                echo "<td>", $unClient['prenom_client'], "</td>";
                                echo "<td>", $unClient['mail_client'], "</td>";
                                echo "<td>", $unClient['tel_client'], "</td>";
                                echo "<td>", $unClient['adresse_client'], "</td>";
                                echo "<td>", $unClient['cp_client'], "</td>";
                                echo "<td>", $unClient['ville_client'], "</td>";
                            }
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
    <?php include("../template/footer.template.php"); ?>
</body>

</html>