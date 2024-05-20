<?php
include("pdo.inc.php");
include("../class/chambres.class.php");

$oChambres = new Chambre($con);

$oChambres->setChambreDispo();
$oChambres->setChambreIndispo();


