<?php
include("../includes/pdo.inc.php");
include("../class/resa.class.php");
include("../class/clients.class.php");

date_default_timezone_set("UTC");
$now = new DateTime("now");
$today = $now->setTime(0, 0, 0);

$oResas = new Reservation($con);
$oClient = new Client($con);
$json = file_get_contents('php://input');
$params = json_decode($json);

$stmt = $oResas->getReservationsDates();
$lesResas = $stmt->fetchAll();

foreach ($lesResas as $uneResa) {
    $dataResas = [
        "id" => $uneResa['id_resa'],
        "text" => $oClient->getClientByReservation($uneResa['id_resa']),
        "start" => $uneResa['date_debut_resa'],
        "end" => $uneResa['date_fin_resa'],
        "resource" => $uneResa['id_chambre']
    ];
    $result[] = $dataResas;
}

header("Content-Type: application/json");
echo json_encode($result);
