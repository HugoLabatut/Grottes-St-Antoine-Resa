<?php
include("../includes/pdo.inc.php");
include("../class/resa.class.php");
include("../class/clients.class.php");

var_dump(
    $_POST['nom_client'],
    $_POST['prenom_client'],
    $_POST['mail_client'],
    $_POST['tel_client'],
    $_POST['adresse_client'],
    $_POST['cp_client'],
    $_POST['ville_client'],
    $_POST['datedebut'],
    $_POST['datefin'],
    $_POST['prixresa'],
    $_POST['categorie']
);

$oResa = new Reservation($con);
$oClient = new Client($con);

$nom = $_POST['nom_client'];
$prenom = $_POST['prenom_client'];
$mail = $_POST['mail_client'];
$tel = $_POST['tel_client'];
$adresse = $_POST['adresse_client'];
$cp = $_POST['cp_client'];
$ville = $_POST['ville_client'];
$ddeb = $_POST['datedebut'];
$dfin = $_POST['datefin'];
$cate = $_POST['categorie'];

$oClient->setClient($nom, $prenom, 'NULL', $mail, $tel, $adresse, $cp, $ville);

$idClient = $con->lastInsertId();

var_dump($idClient);

$oResa->setReservation($idClient);

$idResa = $con->lastInsertId();

$oResa->setDateResa($ddeb, $dfin, $cate, $idResa);

$lesResa = $oResa->getReservations();

$oChambre = new Chambre($con);

$lesEtatsResaChambres = $oChambre->getChambresByEtatResa(1);

foreach ($lesResa as $uneResa) {
    var_dump($uneResa['id_resa']);
}

foreach ($lesEtatsResaChambres as $uneChambre) {
    var_dump($uneChambre['id_chambre'], $uneChambre['etat_resa_chambre']);
}
