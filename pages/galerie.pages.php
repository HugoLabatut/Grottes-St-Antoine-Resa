<?php
include("../includes/pdo.inc.php");
include("../class/photos.class.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie photos - Grottes de St Antoine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include("../template/header.template.php"); ?>
    <br>
    <div class="container">
        <h1>Galerie photos</h1>
        <p>Rédiger pour la galerie.</p>
        <hr>
        <?php 
            $oPhotos = new Photo($con);
            $lesPhotos = $oPhotos->getPhotos();
            foreach ($lesPhotos as $unePhoto) {
                $lienPhoto = $unePhoto['lien_photo'];
                echo '<div class="col">
                <div class="row">
                    <img class="img-thumbnail" style="width: 600px; display: block; margin: auto;" src="../', $lienPhoto,'">
                </div>
                <br>
                </div>';
            }
        ?>
    </div>
    <?php include("../template/footer.template.php"); ?>
</body>

</html>