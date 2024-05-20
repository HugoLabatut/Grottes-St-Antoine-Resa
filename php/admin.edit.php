<?php
include("../includes/pdo.inc.php");
include("../class/admin.class.php");

$oAdmin = new Administrateur($con);

if (isset($_POST['editMdpAdmin'])) {
    $nom_admin = $_POST['nom_admin'];
    $old_mdp_admin_bdd = $oAdmin->getAdminPasswordByNom($nom_admin);
    $old_mdp_admin_form = sha1($_POST['mdp_admin']);
    if ($old_mdp_admin_bdd != $old_mdp_admin_form) {
        echo "<script>alert('Le mot de passe actuel est incorrect.');
                history.back();
                </script>";
    } else {
        $new_mdp_admin = sha1($_POST['nouv_mdp_admin']);
        $oAdmin->setAdminNouvMDP($nom_admin, $new_mdp_admin);
    }
}
