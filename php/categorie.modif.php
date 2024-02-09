<?php
include("../includes/pdo.inc.php");
include("../class/categories.class.php");
include("../class/photos.class.php");
include("../class/tarifs.class.php");

$oCategories = new Categorie($con);
$lesCategories = $oCategories->getCategories();

var_dump($_POST['update'], $_POST['libcategorie'], $_POST['desccategorie']);

if (isset($_POST['update'])) {
    $idc = $_POST['update'];
    $lib = $_POST['libcategorie'];
    $desc = $_POST['desccategorie'];
    $oCategories->setCategorieById($idc, $lib, $desc);
    header("location:../pages/categories.pages.php");
} elseif (isset($_POST['create_tarif'])) {
    $lib = $_POST['libsaisonnalite'];
    $datedeb = $_POST['datedebsaisonnalite'];
    $datefin = $_POST['datefinsaisonnalite'];
    $valeur = $_POST['valeurtarif'];
    $idc = $_POST['create_tarif'];
    $oTarif = new Tarif($con);
    $oTarif->setTarif($lib, $datedeb, $datefin, $valeur, $idc);
    header("location:../pages/modifcategorie.pages.php?idCategorie={$idc}");
} elseif (isset($_POST['update_tarif'])) {
    $oTarifs = new Tarif($con);
    $lesTarifs = $oTarifs->getTarifs();
    foreach ($lesTarifs as $unTarif) {
        $idt = $unTarif['id_tarif'];
        $lib = 'new_libsaisonnalite' . $idt;
        $datedeb = 'new_datedebsaisonnalite' . $idt;
        $datefin = 'new_datefinsaisonnalite' . $idt;
        $valeur = 'new_tarif' . $idt;
        if ($idt == $_POST['update_tarif']) {
            $nouvlib = $_POST[$lib];
            $nouvddeb = $_POST[$datedeb];
            $nouvdfin = $_POST[$datefin];
            $nouvval = $_POST[$valeur];
            $oTarifs->editTarif($idt, $nouvlib, $nouvddeb, $nouvdfin, $nouvval);
        }
    }
    header("location:../pages/modifcategorie.pages.php?idCategorie={$_POST['update_tarif']}");
} elseif (isset($_POST['update_photo'])) {
    $idc = $_POST['update_photo'];
    $unePhotoNom = $_FILES['photocategorie']['name'];
    var_dump($unePhotoNom);
    $unePhotoTemp = $_FILES['photocategorie']['tmp_name'];
    move_uploaded_file($unePhotoTemp, '../res/img/' . $unePhotoNom);
    $lienPhoto = "res/img/" . $unePhotoNom;
    $oPhoto = new Photo($con);
    $oPhoto->setPhoto($unePhotoNom, $lienPhoto, $idc);
    header("location:../pages/modifcategorie.pages.php?idCategorie={$idc}");
}
