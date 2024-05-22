<?php 
include("../includes/pdo.inc.php");
include("../class/bar.class.php");

var_dump($_POST['libbar']);
var_dump($_POST['ddebbar']);
var_dump($_POST['dfinbar']);
var_dump($_POST['pctbar']);

$pctbar_decimal = $_POST['pctbar'] / 100;

var_dump($pctbar_decimal);

$oBar = new BAR($con);

$oBar->setBAR($_POST['libbar'], $_POST['ddebbar'], $_POST['dfinbar'], $pctbar_decimal);

echo "<script>alert('La saison a été ajoutée.');
window.location.replace('../pages/bar.pages.php');";
