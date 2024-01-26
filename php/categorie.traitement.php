<?php
include("../includes/pdo.inc.php");
include("../class/categories.class.php");

$oCategories = new Categorie($con);
$lesCategories = $oCategories->getCategories();

if (isset($_POST['update'])) {
    foreach ($lesCategories as $uneCategorie) {
        $idc = $uneCategorie['id_categorie'];
        $nom = 'libcategorie' . $idc;
        $desc = 'desccategorie' . $idc;
        if ($idc == $_POST['update']) {
            $nouvLibCategorie = $_POST[$nom];
            $nouvDescCategorie = $_POST[$desc];
            $nouvIdCategorie = $_POST['update'];
            $oCategories->setCategorieById($nouvIdCategorie, $nouvLibCategorie, $nouvDescCategorie);
            echo "<script>
                alert('Les informations ont été mises à jour.');
                window.location.replace('../pages/categories.pages.php');
            </script>";
        }
    }
} elseif (isset($_POST['gounecategorie'])) {
    header("Location:../pages/modifcategorie.pages.php?idCategorie={$_POST['gounecategorie']}");
} elseif (isset($_POST['delete'])) {
    var_dump($_POST['delete']);
    die();
} else {
    if (empty($_POST['lib_categorie']) and empty($_POST['desc_categorie'])) {
        echo "<script>
                alert('Veuillez renseigner tous les champs.');
                window.location.replace('../pages/categories.pages.php');
            </script>";
    } else {
        $nouvelleCategorieLib = $_POST['lib_categorie'];
        $nouvelleCategorieDesc = $_POST['desc_categorie'];
        $oNouvCate = new Categorie($con);
        $oNouvCate->setCategorie($nouvelleCategorieLib, $nouvelleCategorieDesc);
        echo "<script>
                alert('Une nouvelle catégorie a été ajoutée.');
                window.location.replace('../pages/categories.pages.php');
            </script>";
    }
}
