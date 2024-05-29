<?php
// puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDDD 

include '../includes/pdo.inc.php';


$keyword = '%' . $_POST['keyword'] . '%';  // récupère la lettre saisie dans le champ texte en provenance de JS

// var_dump($idchambre);

$sql = "SELECT * FROM bar WHERE lib_bar LIKE (:var)";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
    //  affichage
    $nom_list_id = str_replace($_POST['keyword'], '<b>' . $_POST['keyword'] . '</b>', $res['id_bar'] . ' ' . $res['lib_bar']);
    // sélection
    echo '<li class="list-group-item" onclick="set_item_categorie(\'' . str_replace("'", "\'", $res['lib_bar']) . '\',\'' . str_replace("'", "\'", $res['id_bar']) . '\')">' . $nom_list_id . '</li>';
}
