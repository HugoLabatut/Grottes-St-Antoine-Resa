<?php
include("../includes/pdo.inc.php");
include("../class/chambres.class.php");

if (isset($_POST['update'])) {
    var_dump($_POST['update']);
    $oChambre = new Chambre($con);
    $lesChambres = $oChambre->getChambres();
    foreach ($lesChambres as $uneChambre) {
        $idchambre = $uneChambre['id_chambre'];
        if ($idchambre == $_POST['update']) {
            $libelle = 'nouv_libelle' . $idchambre;
            $categorie = 'id_categorie' . $idchambre;
            $nouvLibChambre = $_POST[$libelle];
            $nouvIdChambre = $_POST['update'];
            $nouvIdCategorie = $_POST[$categorie];
            var_dump($nouvLibChambre, $nouvIdChambre, $nouvIdCategorie);
            $oChambre->setChambreByID($nouvIdChambre, $nouvLibChambre, $nouvIdCategorie);
            header("location:../pages/chambres.pages.php");
        }
    }
} else {
    if (isset($_POST['lib_chambre']) && isset($_POST['id_categorie'])) {
        var_dump($_POST['lib_chambre']);
        var_dump($_POST['lib_categorie']);
        var_dump($_POST['id_categorie']);
        $libchambre = $_POST['lib_chambre'];
        $idcategorie = $_POST['id_categorie'];
        $oChambre = new Chambre($con);
        $oChambre->setChambre($libchambre, $idcategorie);
        header("location:../pages/chambres.pages.php");
    } else {
        echo "<script>
                    alert('Veuillez renseigner tous les champs.');
                    window.location.replace('../pages/chambres.pages.php');
                </script>";
    }
}
