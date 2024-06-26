<?php
include("../includes/pdo.inc.php");
include("../includes/update_chambres.inc.php");
include("../class/resa.class.php");
include("../class/clients.class.php");

echo "Début !<br>";

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

$oChambre = new Chambre($con);

$chambresDispos = $oChambre->getChambresByDispoAndCategorie($cate);

$oChambre->setChambreByResa($idResa, $cate, $ddeb, $dfin);
?>

<script>
    alert("Votre réservation a été enregistrée. Vous receverez un courriel pour la facturation.");
    window.location.replace("../index.php");
</script>
