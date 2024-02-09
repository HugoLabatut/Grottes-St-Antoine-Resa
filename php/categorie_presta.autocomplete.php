<?php
// puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDDD 

include '../includes/pdo.inc.php';
include("../class/chambres.class.php");


$keyword = '%' . $_POST['keyword'] . '%';  // récupère la lettre saisie dans le champ texte en provenance de JS
$idchambre = $_POST['idchambre'];

// var_dump($idchambre);

$sql = "SELECT * FROM categories WHERE lib_categorie LIKE (:var)";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
    //  affichage
    $nom_list_id = str_replace($_POST['keyword'], '<b>' . $_POST['keyword'] . '</b>', $res['id_categorie'] . ' ' . $res['lib_categorie']);
    // sélection
    echo '<li class="list-group-item" onclick="set_item_categorie_presta(\'' . str_replace("'", "\'", $res['lib_categorie']) . '\',\'' . str_replace("'", "\'", $res['id_categorie']) . '\',\'' . str_replace("'", "\'", $idchambre) . '\')">' . $nom_list_id . '</li>';
}
