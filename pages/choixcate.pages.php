<?php
include("../includes/pdo.inc.php");
session_start();
if (!isset($_SESSION['nomclient']) and !isset($_SESSION['prenomclient']) and !isset($_SESSION['mailclient'])) {
    echo "<script>
                alert('Veuillez d'abord vous enregistrer.');
                // window.location.replace('../pages/enregistrement.pages.php');
        </script>";
}
var_dump($_SESSION['nomclient']);
var_dump($_SESSION['prenomclient']);
var_dump($_SESSION['mailclient']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la catégorie - Grottes de Saint-Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include("../template/header.template.php");
    ?>

</body>

</html>