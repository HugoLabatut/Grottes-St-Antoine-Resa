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
    $valeur = $_POST['valeurtarif'];
    $idc = $_POST['create_tarif'];
    $bar = $_POST['id_bar'];
    $oTarif = new Tarif($con);
    $oTarif->setTarif($valeur, $idc, $bar);
    header("location:../pages/modifcategorie.pages.php?idCategorie={$idc}");
} elseif (isset($_POST['update_tarif'])) {
    $oTarifs = new Tarif($con);
    $lesTarifs = $oTarifs->getTarifs();
    foreach ($lesTarifs as $unTarif) {
        $idt = $unTarif['id_tarif'];
        $valeur = 'new_tarif' . $idt;
        $bar = 'new_bar' . $idt;
        if ($idt == $_POST['update_tarif']) {
            $nouvlib = $_POST[$lib];
            $nouvval = $_POST[$valeur];
            $nouvbar = $_POST[$bar];
            $oTarifs->editTarif($idt, $nouvbar, $nouvval);
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
