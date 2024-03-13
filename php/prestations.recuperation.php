<?php
include("../includes/pdo.inc.php");
include("../class/chambres.class.php");
include("../class/categories.class.php");

$oPrestas = new Chambre($con);
$oCate = new Categorie($con);
$json = file_get_contents('php://input');
$params = json_decode($json);

$prestations = $oPrestas->getChambres();

foreach ($prestations as $unePresta) {
    $dataPresta = [
        "id" => $unePresta['id_chambre'],
        "name" => $unePresta['lib_chambre']
    ];
    $result[] = $dataPresta;
}

header("Content-Type: application/json");
echo json_encode($result);
