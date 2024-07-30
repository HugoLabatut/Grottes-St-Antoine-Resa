<?php

include("../includes/pdo.inc.php");
include("../class/admin.class.php");

session_start();

if (!empty($_POST['nom_admin']) and !empty($_POST['mdp_admin'])) {
    $nom_admin_form = $_POST['nom_admin'];
    $mdp_admin_form = sha1($_POST['mdp_admin']);
    $oAdmin = new Administrateur($con);
    $nom_admin_bdd = $oAdmin->getAdminByNom($nom_admin_form);
    $mdp_admin_bdd = $oAdmin->getAdminPasswordByNom($nom_admin_form);
    if ($nom_admin_bdd == $nom_admin_form and $mdp_admin_bdd == $mdp_admin_form) {
        $_SESSION['nom_admin'] = $nom_admin_bdd;
        $_SESSION['mdp_admin'] = $mdp_admin_bdd;
        echo "<script>
                alert('DEBUG - Ok.');
                window.location.replace('../pages/dashboard.pages.php');
        </script>";
        exit();
    } else {
        echo "<script>
                alert('Le nom d\'administrateur ou le mot de passe est incorrect.');
                window.location.replace('../pages/logadmin.pages.php');
        </script>";
    }
} else {
    echo "<script>
            alert('Veuillez renseigner tous les champs.');
            window.location.replace('../pages/logadmin.pages.php');
        </script>";
}
