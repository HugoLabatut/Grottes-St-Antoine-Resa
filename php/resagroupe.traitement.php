<?php 

include("../includes/pdo.inc.php");
include("../includes/update_chambres.inc.php");
include("../class/resa.class.php");
include("../class/clients.class.php");

$oResa = new Reservation($con);
$oClient = new Client($con);

var_dump(
    $_POST['nom_client'], 
    $_POST['prenom_client'], 
    $_POST['raison_sociale_client'], 
    $_POST['mail_client'], 
    $_POST['tel_client'], 
    $_POST['adresse_client'], 
    $_POST['cp_client'], 
    $_POST['ville_client'], 
    $_POST['date_debut_resa'], 
    $_POST['date_fin_resa'], 
    $_POST['nbre_personnes'], 
    $_POST['id_categorie']
);

$nomclient = $_POST['nom_client'];
$prenomclient = $_POST['prenom_client'];
$rsclient = $_POST['raison_sociale_client'];
$mailclient = $_POST['mail_client'];
$telclient = $_POST['tel_client'];
$adresseclient = $_POST['adresse_client'];
$cpclient = $_POST['cp_client'];
$villeclient = $_POST['ville_client'];
$ddebclient = $_POST['date_debut_resa'];
$dfinclient = $_POST['date_fin_resa'];
$nbrepersonne = $_POST['nbre_personnes'];
$idcategorie = $_POST['id_categorie'];

$oClient->setClient($nomclient, $prenomclient, $rsclient, $mailclient, $telclient, $adresseclient, $cpclient, $villeclient);

$idClient = $con->lastInsertId();

var_dump($idClient);

$oResa->setReservation($idClient);

$idResa = $con->lastInsertId();

$oChambre = new Chambre($con);

$chambresDispos = $oChambre->getChambresByDispoAndCategorie($cate);

echo "ID catégorie = ", $cate, "<br>";

$i = 0;

foreach ($chambresDispos as $uneChambre) {
    $i++;
    if ($i == 1) {
        echo "ID = ", $uneChambre['id_chambre'], " Lib = ", $uneChambre['lib_chambre'], "<br>";
        $oResa->setDateResa($uneChambre['id_chambre'], $ddebclient, $dfinclient, $idcategorie, $idResa);
        $oChambre->setChambreIndispoByID($uneChambre['id_chambre']);
    }
}
?>

<script>
    alert("Réservation enregistrée.");
    window.location.replace("../pages/dashboard.pages.php");
</script>




