<?php

class Tarif
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getTarifs()
    {
        $sql = "SELECT * FROM tarifs";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getTarifByCategorie($idc)
    {
        $data = [":idcategorie" => $idc];
        $sql = "SELECT * FROM tarifs WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function setTarif($lib, $datedeb, $datefin, $valeur, $idcat)
    {
        $data = [
            ":lib" => $lib,
            ":datedeb" => $datedeb,
            ":datefin" => $datefin,
            ":valeur" => $valeur,
            ":idcat" => $idcat
        ];
        $sql = "INSERT INTO tarifs (lib_saisonnalité, date_deb_saisonnalité, date_fin_saisonnalité, valeur_tarif, id_categorie) VALUES (:lib, :datedeb, :datefin, :valeur, :idcat)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setTarifByCategorie($idc)
    {
        $data = [":idcategorie" => $idc];
        $sql = "SELECT * FROM tarifs WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $row = $stmt->execute($data);
        return $row;
    }

    public function editTarif($idt, $lib, $ddeb, $dfin, $val)
    {
        $data = [
            ":idtarif" => $idt,
            ":libsaison" => $lib,
            ":ddebsaison" => $ddeb,
            ":dfinsaison" => $dfin,
            ":valeurtarif" => $val
        ];
        $sql = "UPDATE tarifs SET lib_saisonnalité = :libsaison, date_deb_saisonnalité = :ddebsaison, date_fin_saisonnalité = :dfinsaison, valeur_tarif = :valeurtarif WHERE id_tarif = :idtarif";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
