<?php
// puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDDD 

include '../includes/pdo.inc.php';


$keyword = '%' . $_POST['keyword'] . '%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM communes WHERE nom_complet_commune LIKE (:var) oR cp_commune like (:var) ";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
    //  affichage
    $nom_list_id = str_replace($_POST['keyword'], '<b>' . $_POST['keyword'] . '</b>', $res['cp_commune'] . ' ' . $res['nom_complet_commune']);
    // sélection 
    echo '<li class="list-group-item" onclick="set_item_commune(\'' . str_replace("'", "\'", $res['cp_commune']) . '\',\'' . str_replace("'", "\'", $res['nom_complet_commune']) . '\',\'' . str_replace("'", "\'", $res['id_commune']) . '\')">' . $nom_list_id . '</li>';
}
