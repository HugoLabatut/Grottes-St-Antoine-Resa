<?php

include("../includes/pdo.inc.php");
include("../class/resa.class.php");

/*
$start = $_GET['start'];
$end = $_GET['end'];
*/

$oResas = new Reservation($con);

$stmt = $oResas->getReservationsDatesByClient();
$lesResas = $stmt->fetchAll();

foreach ($lesResas as $uneResa) {
    $dataResas = [
        "id_resa" => $uneResa['id_resa'],
    ];
    $result[] = $dataResas;
}

header("Content-Type: application/json");
echo json_encode($result);
