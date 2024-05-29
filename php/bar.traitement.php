<?php 
include("../includes/pdo.inc.php");
include("../class/bar.class.php");

if (isset($_POST['update'])) {
    var_dump($_POST['update']);
    $oBar = new BAR($con);
    $lesBar = $oBar->getBAR();
    foreach ($lesBar as $uneBar) {
        $idbar = $uneBar['id_bar'];
        if ($idbar == $_POST['update']) {
            $lib = "nouv_libelle" . $idbar;
            $ddeb = "nouv_ddeb" . $idbar;
            $dfin = "nouv_dfin" . $idbar;
            $pct = "nouv_pct" . $idbar;
            $nouvIDBar = $_POST['update'];
            $nouvLibBar = $_POST[$lib];
            $nouvDdebBar = $_POST[$ddeb];
            $nouvDfinBar = $_POST[$dfin];
            $nouvPctDecimal = $_POST[$pct] / 100;
            var_dump($nouvIDBar, $nouvLibBar, $nouvDdebBar, $nouvDfinBar, $nouvPctDecimal);
            $oBar->setBARByID($nouvIDBar, $nouvLibBar, $nouvDdebBar, $nouvDfinBar, $nouvPctDecimal);
            echo "<script>alert('La saison a été mise à jour.');
            window.location.replace('../pages/bar.pages.php');</script>";
        }
    }
} else {
    if (isset($_POST['libbar']) && isset($_POST['ddebbar']) && isset($_POST['dfinbar']) && isset($_POST['pctbar'])) {
        var_dump($_POST['libbar']);
        var_dump($_POST['ddebbar']);
        var_dump($_POST['dfinbar']);
        var_dump($_POST['pctbar']);
        $pctbar_decimal = $_POST['pctbar'] / 100;
        var_dump($pctbar_decimal);
        $oBar = new BAR($con);
        $oBar->setBAR($_POST['libbar'], $_POST['ddebbar'], $_POST['dfinbar'], $pctbar_decimal);
        echo "<script>alert('La saison a été ajoutée.');
        window.location.replace('../pages/bar.pages.php');</script>";
    } else {
        echo "<script>alert('Veuillez renseigner tous les champs !');
        window.location.replace('../pages/bar.pages.php');";
    }
}
