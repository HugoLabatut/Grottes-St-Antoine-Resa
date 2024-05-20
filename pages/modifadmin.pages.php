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
$nom_admin_session = $_SESSION['nom_admin'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau de configuration - Grottes Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    include("../class/admin.class.php");
    ?>
    <br>
    <div class="container">
        <h1>Bienvenue <?php echo $_SESSION['nom_admin']; ?></h1>
        <p style="text-align: justify">
            Cette page permet de modifier les informations de l'administrateur. Vous devez faire attention à ce que vous faites sur cette page pour ne pas risquer un problème de connexion au tableau de bord.
        </p>
        <?php
        if ($_SESSION['nom_admin'] == "root") {
        ?>
        <p style="text-align: justify" class="alert alert-danger">
            <b>Attention :</b> Vous êtes l'utilisateur "root". Vous pouvez modifier les autres administrateurs du site (leurs noms et leurs mots de passe). Vous manipulez des données sensibles qui peuvent compromettre la sécurité du site s'ils venaient à fuiter. Soyez prudent pendant la consultation de ces pages.
        </p>
        <?php } ?>
        <hr>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Panneau de configuration</h4>
                </div>
                <div class="card-body">
                    <form action="../php/admin.edit.php" method="post">
                        <div class="form-group">
                            <label for="nom_admin" class="form-label">Nom de l'administrateur :</label>
                            <?php 
                            echo '
                            <input type="text" name="nouv_nom_admin" id="nouv_nom_admin" value="', $nom_admin_session,'" class="form-control">
                            <br>
                            <button class="btn btn-primary" name="editNomAdmin" type="submit">Changer le nom d\'utilisateur</button>';
                            ?>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h5>Changer de mot de passe :</h5>
                            <label for="mdp_admin" class="form-label">Mot de passe actuel :</label>
                            <?php 
                            $oAdmin = new Administrateur($con);
                            echo '<input type="password" name="mdp_admin" id="mdp_admin" class="form-control">';
                            ?>
                            <label for="nouv_mdp_admin" class="form-label">Nouveau mot de passe :</label>
                            <input class="form-control" type="password" name="nouv_mdp_admin" id="nouv_mdp_admin" class="form-class">
                            <?php 
                            echo '<input type="text" name="nom_admin" id="nom_admin" hidden="hidden" value="', $_SESSION['nom_admin'], '">';
                            ?>
                            <br>
                            <button class="btn btn-primary" name="editMdpAdmin" type="submit">Changer de mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>