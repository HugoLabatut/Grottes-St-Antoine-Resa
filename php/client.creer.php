<?php

include("../includes/pdo.inc.php");
include("../class/clients.class.php");

var_dump($_POST['nom_client']);
var_dump($_POST['prenom_client']);
var_dump($_POST['raison_sociale_client']);
var_dump($_POST['mail_client']);
var_dump($_POST['tel_client']);
var_dump($_POST['adresse_client']);
var_dump($_POST['cp_client']);
var_dump($_POST['ville_client']);

$oClient = new Client($con);

$n = $_POST['nom_client'];
$p = $_POST['prenom_client'];
$rs = $_POST['raison_sociale_client'];
$mail = $_POST['mail_client'];
$tel = $_POST['tel_client'];
$adr = $_POST['adresse_client'];
$cp = $_POST['cp_client'];
$vil = $_POST['ville_client'];

$oClient->setClient($n, $p, $rs, $mail, $tel, $adr, $cp, $vil);

session_start();

$_SESSION['nomclient'] = $n;
$_SESSION['prenomclient'] = $p;
$_SESSION['mailclient'] = $mail;

header("Location:../pages/choixcate.pages.php");

?>